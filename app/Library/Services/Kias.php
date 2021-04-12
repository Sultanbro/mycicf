<?php

namespace App\Library\Services;

use App\XML\Kias\AuthenticateResult;
use App\XML\Kias\GetUpperLevelResult;
use App\XML\Kias\MyCoordinationListResult;
use Debugbar;
use Exception;
use Illuminate\Support\Facades\Auth;
use SoapClient;
use SimpleXMLElement;

class Kias implements KiasServiceInterface
{
    /**
     * @var Kias
     */
    private static $instance;
    public static function instance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    const APP_ID = 868281;
    const ACTIVE = 'Y';

    public $username;
    public $password;
    /**
     * @var SoapClient
     */
    public $client;
    public $request;
    public $_sId;
    public $tries = 0;

    const DICT_CURRENCY_USD = 9716;
    const DICT_CURRENCY_RUB = 9788;
    const DICT_CURRENCY_EURO = 9721;
    const DICT_CURRENCY_TENGE = 9813;

    /**
     * @var string Ссылка на сервис
     */
    public $url;

    /**
     * @var bool
     */
    private $initialized = false;

    /**
     * @var bool
     */
    private $systemInitialized = false;

    public function __construct() {
        // sleep(1); // sleep здесь для имитации задержки

        Debugbar::log('Kias::Construct');
    }

    private function getLifetime() {
        return now()->addMinutes(config('kias.cache.lifetime'));
    }

    public function init($session)
    {
        if ($this->initialized) {
            return;
        }
        Debugbar::log('Kias::Init');
        $this->url = config('kias.url');
        $this->getClient();
        $this->_sId = $session;
        $this->initialized = true;
    }

    /**
     * Get kias by system credentials
     */
    public function initSystem()
    {
        if ($this->systemInitialized) {
            return;
        }
        Debugbar::log('Kias::Mock Init System');
        $this->url = config('kias.url');
        $this->getClient();

        $username = config('kias.auth.login');
        $password = config('kias.auth.password');
        $passwordHash = hash('sha512', $password);

        // $key = 'kias::authenticate::' . $username . '::' . $passwordHash;
        Debugbar::startMeasure('Authenticate in Kias');
        $systemData = $this->authenticate($username, $passwordHash);
        Debugbar::stopMeasure('Authenticate in Kias');
        $this->_sId = $systemData->Sid;
        $this->systemInitialized = true;
    }

    /**
     * Получить Soap-клиент
     *
     * @return SoapClient
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new SoapClient($this->url, [
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace'      => 1,
            ]);
        }

        return $this->client;
    }

    private function execProc($name, $params = []) {
        $response = $this->client->ExecProc([
            'pData' => $this->createRequestData($name, $params),
        ]);
        return $response->ExecProcResult->any;
    }

    public function request($name, $params = [])
    {
        Debugbar::log('Kias::Mock Request [' . $name . ' :: ' . json_encode($params) . ']');
        try {
            switch ($name) { // Кешируем некоторые запросы
                case 'Auth':
                    $key = 'kias::Auth::' . $name . '::' . serialize($params) . '::';
                    $ttl = $this->getLifetime();
                    Debugbar::startMeasure('Authenticate in Kias');
                    $execResponse = cache()->remember($key, $ttl, function () use ($name, $params) {
                        return $this->execProc($name, $params);
                    });
                    Debugbar::stopMeasure('Authenticate in Kias');
                    break;

                case 'User_CicHelloSvc':
                    $key = 'kias::User_CicHelloSvc::' . $name . '::' . serialize($params) . '::';
                    $ttl = $this->getLifetime();
                    Debugbar::startMeasure('User_CicHelloSvc in Kias');
                    $execResponse = $this->execProc($name, $params);
                    Debugbar::stopMeasure('User_CicHelloSvc in Kias');
                    break;

                case 'User_CicMyCoordinationList':
                    $key = 'kias::User_CicMyCoordinationList::' . $name . '::' . serialize($params) . '::';
                    $ttl = $this->getLifetime();
                    Debugbar::startMeasure('User_CicMyCoordinationList in Kias');
                    $execResponse = $this->execProc($name, $params);
                    // $execResponse = cache()->remember($key, $ttl, function () use ($name, $params) {
                    //     return $this->execProc($name, $params);
                    // });
                    Debugbar::stopMeasure('User_CicMyCoordinationList in Kias');
                    break;


                default:
                    $execResponse = $this->execProc($name, $params);
            }

            $xml = new SimpleXMLElement(
                '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . $execResponse
            );

        } catch (\SoapFault $exception) {
            return $this->request($name, $params);
        }

        if (env('APP_ENV', 'local') !== 'production') {
            if ($name != 'GetDictiList' && $name != 'User_CicHelloSvc' && $name != 'User_CicGetAgrObjectClassList'
                && $name != 'Auth'
                && $name != 'GETATTACHMENTDATA') {
                $t     = microtime(true) + 6 * 60 * 60;
                $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
                $d     = new \DateTime(date('Y-m-d H:i:s.'.$micro, $t));
                $date  = $d->format('d-m-Y_H-i-s-u');

                // TODO Use Storage::disk instead
                file_put_contents(
                    storage_path()."/kias_logs/{$date}_kias_agent_result_{$name}_.xml",
                    $xml->asXml()
                );
            }
        }

        if (isset($xml->error)) {
            if (isset($xml->error->code) && $xml->error->code == '001') {
                $response = $this->authenticate(Auth::user()->username, Auth::user()->password_hash);
                if ($response->error) {
                    Auth::logout();
                } else {
                    $User             = Auth::user();
                    $User->session_id = $response->Sid;
                    $this->_sId       = $response->Sid;
                    $User->save();

                    return $this->request($name, $params);
                }
            }
        }

        return $xml->result ?? $xml;
    }

    public function createRequestData($name, $params)
    {
        $params['Sid'] = $this->_sId;
        if ($name == 'Auth') {
            unset($params['Sid']);
        }
        $xml     = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><data></data>');
        $request = $xml->addChild('request');
        $request->addChild('reqName', $name);
        $request->addChild('AppId', static::APP_ID);
        $request->addChild('RequestIp', $_SERVER['REMOTE_ADDR'] ?? '1');
        $request->addChild('UserAgent', $_SERVER['HTTP_USER_AGENT'] ?? '1');
        self::addXmlChildren($request->addChild('params'), $params);
        if (env('APP_ENV', 'local') !== 'production') {
            if ($name != 'GetDictiList' && $name != 'User_CicHelloSvc' && $name != 'User_CicGetAgrObjectClassList'
                && $name != 'Auth'
                && $name != 'GETATTACHMENTDATA') {
                $t     = microtime(true) + 6 * 60 * 60;
                $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
                $d     = new \DateTime(date('Y-m-d H:i:s.'.$micro, $t));
                $date  = $d->format('d-m-Y_H-i-s-u');
                file_put_contents(
                    storage_path()."/kias_logs/".$date."_kias_agent_".$name."_.xml",
                    $xml->asXML()
                );
            }
        }

        return $xml->asXML();
    }

    protected static function addXmlChildren($object, $params, $parentName = null)
    {
        foreach ($params as $paramName => $paramValue) {
            if (is_array($paramValue)) {
                $integerArray = isset($paramValue[0]);
                static::addXmlChildren(
                    ($integerArray)
                        ? $object
                        : $object->addChild((is_int($paramName) && $parentName)
                        ? $parentName : $paramName
                    ),
                    $paramValue,
                    $integerArray ? $paramName : null
                );
            } else {
                $object->addChild($paramName, $paramValue);
            }
        }
    }

    /**
     * Этот метод вешает всю систему, т.к. вызывается в Middleware на большом количестве
     * роутов
     *
     * @param string $username
     * @param string $password
     * @return mixed|AuthenticateResult
     */
    public function authenticate($username, $password)
    {
        return $this->request('Auth', [
            'Name' => $username,
            'Pwd'  => $password,
        ]);
    }

    public function authBySystem()
    {
        /**
         * @var $response AuthenticateResult
         */
        $response = $this->request('Auth', [
            'Name' => config('kias.auth.login'),
            'Pwd'  => hash('sha512', config('kias.auth.password')),
        ]);
        if ($response->error) {
            throw new Exception('Authentication failed', '419');
        }

        $this->_sId = $response->Sid;
    }

    /**
     * @return \App\XML\Kias\GetBranchesResult|SimpleXMLElement
     */
    public function getBranches()
    {
        return $this->request('User_CicGetUserList', [
            'number' => 1,
        ]);
    }

    /**
     * @param $ISN
     * @return GetUpperLevelResult|SimpleXMLElement
     */
    public function getUpperLevel($ISN)
    {
        return $this->request('User_CicGetUserLVL', [
            'EmplISN' => $ISN,
        ]);
    }

    /**
     * @param $ISN
     * @param $dateBeg
     * @param $dateEnd
     * @return \App\XML\Kias\GetEmplInfoResult|SimpleXMLElement
     */
    public function getEmplInfo($ISN, $dateBeg, $dateEnd)
    {
        return $this->request('User_CicGetEmplInfo', [
            'DateBeg' => $dateBeg,
            'DateEnd' => $dateEnd,
            'EmplISN' => $ISN,
        ]);
    }

    /**
     * @param $refisn
     * @param $isn
     * @param $pictType
     * @return \App\XML\Kias\GetAttachmentDataResult|SimpleXMLElement
     */
    public function getAttachmentData($refisn, $isn, $pictType)
    {
        return $this->request('GETATTACHMENTDATA', [
            'REFISN'   => $refisn,
            'ISN'      => $isn,
            'PICTTYPE' => $pictType,
        ]);
    }

    /**
     * @param $ISN
     * @return MyCoordinationListResult|SimpleXMLElement
     */
    public function myCoordinationList($ISN)
    {
        return $this->request('User_CicMyCoordinationList', [
            'DateBeg' => '01.01.1970',
            'DateEnd' => date('d.m.Y', strtotime('tomorrow')),
            'EmplISN' => $ISN,
        ]);
    }

    public function getCoordination($docIsn)
    {
        return $this->request('User_CicGetCoordinationList', [
            'DocISN' => $docIsn,
        ]);
    }

    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark, $Resolution)
    {
        return $this->request('User_CicSetCoordinationList', [
            'DocISN'     => $DocISN,
            'EmplISN'    => $EmplISN,
            'Solution'   => $Solution,
            'Remark'     => $Remark,
            'Resolution' => $Resolution == "0" ? "" : $Resolution,
        ]);
    }

    public function getAttachmentsList($docIsn)
    {
        return $this->request('User_CicGetAttachmentList', [
            'ISN' => $docIsn,
        ]);
    }

    public function getEmplImagesByDate($date)
    {
        return $this->request('User_CicGetEmplImagesByDate', [
            'Date' => $date,
        ]);
    }

    public function getEmplMotivation($isn, $begin)
    {
        return $this->request('User_CicGetEmplMotivation', [
            'EmplISN' => $isn,
            'Month'   => date('m', strtotime($begin)),
            'Year'    => date('Y', strtotime($begin)),
        ]);
    }

    public function GetInfoUser($dateBeg, $dateEnd, $emplIsn)
    {
        return $this->request('User_CicGetUserInfo', [
            'DateBeg' => $dateBeg,
            'DateEnd' => $dateEnd,
            'EmplISN' => $emplIsn,
        ]);
    }

    public function getEmplRating($user_isn, $begin_date)
    {
        return $this->request('User_CicGetEmplRating', [
            'EmplISN' => $user_isn,
            'Month'   => date('m', strtotime($begin_date)),
            'Year'    => date('Y', strtotime($begin_date)),
        ]);
    }

    public function getPrintableDocument($isn, $template, $classId)
    {
        return $this->request('GetPrintableDocument', [
            'ISN'         => $isn,
            'TemplateISN' => $template,
            'ClassID'     => $classId,
        ]);
    }

    public function getExpressAttributes($product){
        return $this->request('User_CicGetAttrExpress', [
            'Product' => $product,
        ]);
    }

    public function getFullObject($product){
        return $this->request('User_CicGetProductInform', [
            'ProductISN' => $product
        ]);
    }

    public function getDictiList($parent)
    {
        return $this->request('GETDICTILIST', [
            'DictiISN' => $parent,
            'Mode' => 0,
        ]);
    }

    public function userCicGetDictiList($tarifISN)
    {
        return $this->request('User_CicGetDictiList', [
            'TariffISN' => $tarifISN,
        ]);

    }

    public function getRegions($parent){
        return $this->request('User_CicGetRegionsAndCity', [
            'region' => $parent
        ]);
    }

    public function getSubject($firstName, $lastName, $patronymic, $iin)
    {
        return $this->request('User_CicSearchSubject', [
            'IIN'          => $iin,
            'FIRSTNAME'    => $firstName,
            'LASTNAME'     => $lastName,
            'PARENTNAME'   => $patronymic,
        ]);
    }

    public function saveSubject($participant){
        return $this->request('User_CicSaveSubject', array_merge($participant,[
                'RESIDENT' => "Y",
                'COUNTRYISN' => "9515"
            ])
        );
    }

    public function setSubject($participant){
        return $this->request('User_CicSetSubject', array_merge($participant,[
                'RESIDENT' => "Y",
                'COUNTRYISN' => "9515"
            ])
        );
    }

    public function expressCalculator($ISN, $SubjISN, $addAttr, $nshb)
    {
        return $this->request('User_CicExpressCalculator', [
            'CustomTemplate' => $nshb,
            'ReqText' => $nshb == 1 ? 'Прошу рассмотреть заявку' : '',
            'ProductISN' => $ISN,
            'SubjISN' => $SubjISN,
            'DeptISN' => '1445791',
            'ADDATTR' => [
                'row' => $addAttr
            ]
        ]);
    }

    public function CreateAgrByAgrcalc($isn){
        return $this->request('CreateAgrByAgrcalc', [
            'CalcISN' => $isn,
            'MODE' => 0
        ]);
    }

    public function getAgreementCalc($isn,$product_id){
        return $this->request('GETAGREEMENTCALC', [
            'AGREEMENTCALCISN' => $isn,
            'PRODUCTISN' => $product_id
        ]);
    }

    public function calcFull($order)
    {

        $result = $this->request('User_CicSaveAgrCalc', [
            'ISN' => $order['calc_isn'],
            'ID' => $order['calc_id'], //"TEMP_515431_" . $order['prodIsn'] . "_" . time(),
            'CalcDA' => $order['calcDA'],
            'ReqText' => $order['DAremark'],
            'CLIENTISN' => $order['subjISN'],
            'EMPLISN' => $order['curator'],
            'PRODUCTISN' => $order['prodIsn'],
            'CLASSISN' => 220603,
            'STATUSISN'    => $order['formular']['status']['Value'],            //223368
            'CURRISN' => self::DICT_CURRENCY_TENGE,
            'DATESIGN' => date('d.m.Y', strtotime($order['contractDate']['sig'])),
            'DATEBEG' => date('d.m.Y', strtotime($order['contractDate']['begin'])),
            'DATEEND' => date('d.m.Y', strtotime($order['contractDate']['end'])),
            'CURRCODE' => 'KZT',

            'AGREEMENT_ADDATTR' => [
                'row' => $order['attributes']
            ],

            'AGREEMENT_ADDATTR_UND' => [
                'row' => $order['und_attributes']
            ],

            'AGROBJECT' => [
                'row' => $order['agrobject']
            ],

            'AGRROLE' => [
                'row' => $order['participants'],
            ],

            'AGRCLAUSE' => [
                'row' => $order['agrclauses']
            ]
        ]);

        return $result;
    }

    public function sendtoExpertSakta($isn,$dateTime,$address)
    {
        return $this->request('User_CicSendtoExpertSakta', [
            'AGRISN' => $isn,
            'DATE' => $dateTime,
            'ADDRESS' => $address
        ]);
    }

    public function sendtoExpert($isn,$dateTime,$address){
        return $this->request('User_CicSendtoExpert', [
            'AGRISN'    => $isn,
            'DATE'  => $dateTime,
            'ADDRESS' => $address
        ]);
    }

    public function createAgrFromAgrCalc($agrCalcIsn){
        return $this->request('User_CicCreateAgrFromAgrCalc',
            ['AgrCalcISN' => $agrCalcIsn ]);
    }

    public function getVehicle($vin = null, $engine = null, $tfNumber = null, $srts = null,$searchTFESBD = null)
    {
        $kiasMethod = $searchTFESBD == null ? 'User_CicSearchVehiclesESBD' : 'User_CicSearchTFESBD';
        $result = $this->request($kiasMethod, [
            'MODELISN'  => null,
            'VIN'       => $vin,
            'ENGINEID'  => $engine,
            'TF_NUMBER' => $tfNumber,
            'SRTS'      => $srts,
        ]);
        $result = $searchTFESBD == null ? $result : $result->ROWSET->row[0];

        if ($result)
            return $result;
    }

    public function saveVehicle($data)
    {
        $data['DATERELEASE'] = '01.01.'.$data['DATERELEASE'];

        return $this->request('User_CicSaveTFESBD', [
            'TF_ID' => $data['TF_ID'],
            'MARKISN' => $data['MARKISN'],
            'PLATE' => $data['PLATE'],
            'MODELISN' => $data['MODELISN'],
            'CLASSISN' => $data['CLASSISN'],
            'VIN' => $data['VIN'],
            'DATERELEASE' => $data['DATERELEASE'],
            'ENGINE_NUMBER' => isset($data['ENGINE_NUMBER']) ? 0 : $data['ENGINE_NUMBER'],
            'ENGINE_POWER' => $data['ENGINE_POWER'],
            'ENGINE_VOLUME' => $data['ENGINE_VOLUME'],
            'RIGHT_HAND_DRIVE_BOOL' => $data['RIGHT_HAND_DRIVE_BOOL'] == 1 ? 'Y' : 'N',
            'COLORISN' => $data['COLORISN'],
            'COLOR' => $data['COLORISN'],
        ]);
    }

//    /**
//     * Сохранение прикрплений в киас
//     * @param $refisn int исн документа
//     * @param $type
//     * @param $name string название файла
//     * @param $data
//     * @return SimpleXMLElement
//     */
//
//    public function saveAttachment($refisn, $name, $file, $type = 'J'){
//        return $this->request('SAVEATTACHMENT', [
//            'REFISN' => $refisn,
//            'PICTTYPE' => $type,
//            'FILEREMARK' => '',
//            'FILENAME' => $name,
//            'ACTIVE ' => 'Y',
//            'OLEOBJECT' => $file
//        ]);
//    }

    public function getPrintableDocumentList($contract_number){
        return $this->request('User_CicGetPrintableDocumentList', [
            'AgrISN' => $contract_number,
            'TemplateISN' => ''
        ]);
    }

    public function getAgrStatus($ISN){
        return $this->request('User_CicGetAgrCalcStatus',[
            'AgrID' => $ISN
        ]);
    }

    public function getOrSetDocs($doc_isn, $type, $status){
        return $this->request('User_CicGetOrSetDocs',[
            'DocISN' => $doc_isn,
            'Type' => $type, // 1 сменить статус, 2 посмотреть статус
            'Status' => $status, //2522 на подписи, 2518 подписан
        ]);
    }

    public function getCoordinationCount($ISN)
    {
        return $this->request('User_CicCountEmplCoordination', [
            'EmplISN' => $ISN,
        ]);
    }

    /**
     * @param $isn
     *
     * @return mixed|SimpleXMLElement
     */
    public function getInsuranceInspectionList($isn, $status, $DateBeg, $DateEnd)
    {
        return $this->request('User_CicGetOsmotrRequest', [
            'EmplISN'   => $isn,
            'StatusISN' => $status,
            'DateBeg'   => $DateBeg,
            'DateEnd'   => $DateEnd,
        ]);
    }

    /**
     * @param $agrisn
     * @param $agrcalcisn
     * @param $isn
     * @param $docIsn
     *
     * @return mixed|SimpleXMLElement
     */
    public function getInsuranceInspectionInfo($agrisn, $agrcalcisn, $isn, $docIsn)
    {
        return $this->request('User_CicGetOsmotrDocs', [
            'Agrisn'     => $agrisn,
            'Agrcalcisn' => $agrcalcisn,
            'Request'    => $isn,
            'Docisn'     => $docIsn,
        ]);
    }

    /**
     * Отправить данные для сохранения в КИАС
     *
     * @param $docIsn
     * @param $dremark
     * @param $data
     *
     * @return mixed|SimpleXMLElement
     */
    public function setInsuranceInspectionInfo($docIsn, $dremark, $data)
    {
        return $this->request('User_CicSetOsmotrDocs', [
            'docisn'  => $docIsn,
            'dremark' => $dremark,
            'details' => $data,
        ]);
    }

    /**
     * Назначить оператора
     *
     * @param $emplIsn
     * @param $docIsn
     * @param $statusIsn
     * @param $remark
     *
     * @return mixed|SimpleXMLElement
     */
    public function setAppointmentOperator($emplIsn, $docIsn, $statusIsn, $remark)
    {
        return $this->request('User_CicSetOsmotrRequest', [
            'OperatorISN' => $emplIsn,
            'RequestISN'  => $docIsn,
            'StatusISN'   => $statusIsn,
            'Remark'      => $remark,
        ]);
    }

    public function getAttachmentPath($type,$refID,$format,$docClass,$refISN,$ISN){
        return $this->request('User_CicGetAttachmentsPath', [
            'RefID' => $refID,
            'RefISN' => $refISN,
            'PictType' => $type,
            'Format' => $format,
            'DocClass' => $docClass,
            'ISN' => $ISN,
        ]);
    }

    public function cicSaveEDS($RefISN,$isn,$iin,$signer,$signerisn,$signeddate,$keyperiod,$remark){
        return $this->request('User_CicSaveEDS', [
            'RefISN' => $RefISN,
            'ISN' => $isn,
            'IIN' => $iin,
            'SIGNER' => $signer,
            'SIGNERISN' => $signerisn,
            'SIGNEDDATE' => $signeddate,
            'KEYPERIOD' => $keyperiod,
            'REMARK' => $remark
        ]);
    }

    /**
     * Получить справочники
     *
     * @param $dictiISN
     * @param $mode
     *
     * @return SimpleXMLElement
     */
    public function getDictList($dictiISN, $mode)
    {
        return $this->request('GetDictiList', [
            'DictiISN' => $dictiISN,
            'Mode'     => $mode,
        ]);
    }

    /**
     * Получить справочники товаров
     *
     * @param $ISN
     *
     * @return SimpleXMLElement
     */

    public function getDictiProducts($ISN){
        return $this->request('User_CicGetFullDictiList', [
            'ISN' => $ISN
        ]);
    }

    /**
     * Загрузка файлов
     *
     * @param        $refisn
     * @param        $name
     * @param        $file
     * @param string $type
     *
     * @return SimpleXMLElement
     */
    public function saveAttachment($refisn, $name, $file, $type = 'J')
    {
        return $this->request('SAVEATTACHMENT', [
            'REFISN'     => $refisn,
            'PICTTYPE'   => $type,
            'FILEREMARK' => '',
            'FILENAME'   => $name,
            'ACTIVE '    => self::ACTIVE,
            'OLEOBJECT'  => $file,
        ]);
    }

    /**
     * @param $deptIsn
     *
     * @return mixed|SimpleXMLElement
     */
    public function getAvarkomByDept($deptIsn)
    {
        return $this->request('User_CicGetAvarkomByDept', [
            'DeptISN' => $deptIsn,
        ]);
    }


    public function getUnderReport($productInfo, $emplIsn, $dateBeg, $dateEnd)
    {
        return $this->request('User_CicGetUnderReport', [
            'Product' => $productInfo,
            'EmplISN' => $emplIsn,
            'DATEBEG' => date('d.m.Y', strtotime($dateBeg)),
            'DATEEND' => date('d.m.Y', strtotime($dateEnd)),
        ]);
    }

    public function saveDocument($isns,$classISN,$emplISN,$subjISN,$docRow, $docParams){
        return $this->request('User_CicSAVEDOCUMENT', [
            'ISN' => $isns,
            'CLASSISN' => $classISN,
            'EMPLISN' => $emplISN,
            'DOCDATE' => date('d.m.Y'),
            'SUBJISN' => $subjISN,
            'DocParams' => [
                'row' => $docParams
            ],
            'DocRow' => [
                'row' => $docRow
            ]
        ]);
    }

    public function buttonClick($docISN,$button){
        return $this->request('User_CicButtonClick',[
            'DOCISN' => $docISN,
            'BUTTON' => $button
        ]);
    }

    /**
     * @param $class_isn
     * @param $doc_isn
     * @return mixed|SimpleXMLElement
     */
    public function getDocRowAttr($class_isn, $doc_isn) {
        return $this->request('User_CicGetDocRowAttr', [
            'CLASSISN' => $class_isn,
            'DOCISN'   => $doc_isn,
        ]);
    }

    public function getDocRating($class_isn) {
        return $this->request('User_CicGetDocRating', [
            'Classisn' => $class_isn,
        ]);
    }
    public function getMySZ($emplIsn, $dateBeg, $dateEnd, $status) {
        return $this->request('User_CicGetMySZ', [
            'EMPLISN' => $emplIsn,
            'DATEBEG' => date('d.m.Y', strtotime($dateBeg)),
            'DATEEND' => date('d.m.Y', strtotime($dateEnd)),
            'STATUS' => $status,
        ]);
    }

    public function userCicSaveDocument($isns, $status_isn, $class_isn, $emplIsn, $docDate, $subjIsn, $row, $docs) {
        return $this->request('User_CicSAVEDOCUMENT', [
            'ISN' => $isns,
            'STATUSISN' => $status_isn,
            'CLASSISN' => $class_isn,
            'EMPLISN' => $emplIsn,
            'DOCDATE' => $docDate,
            'SUBJISN' => $subjIsn,
            'DocParams' => [
                'row' => $row
//                    [
//                        'ATTRISN' => $attrIsn,
//                        'REMARK' => $remark,
//                        'VAL' => $val, //Значение
//                        'VALUE' => $value, //Значение атрибута
//                ]
            ],
            'DocRow' => [
                'row' => $docs
            ],
//            'DocRow' => [
//                'row' => [
//                    'valn1' => $valn1, //Число 1 значения
//                    'valc1' => $valc1, //Строка 1 значания
//                    'vald1' => $vald1, //Дата 1 значения
//                ]
//            ],
        ]);
    }

    public function userCicChangeDocCoordination($row) {
        return $this->request('User_CicChangeDocCoordination', [
            'row' => $row,
        ]);
    }


}
