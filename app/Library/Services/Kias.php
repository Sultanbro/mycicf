<?php
/**
 * Created by PhpStorm.
 * User: IAkbergen
 * Date: 12.04.2019
 * Time: 17:14
 */

namespace App\Library\Services;
use Exception;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SoapClient;
use SimpleXMLElement;
use App\Library\Services\KiasServiceInterface;


class Kias implements KiasServiceInterface
{
    public $username;
    public $password;
    public $client;
    public $request;
    public $_sId;
    const APP_ID = 868281;
    public $tries = 0;

    const DICT_CURRENCY_USD = 9716;
    const DICT_CURRENCY_RUB = 9788;
    const DICT_CURRENCY_EURO = 9721;
    const DICT_CURRENCY_TENGE = 9813;

    /**
     * @var string Ссылка на сервис
     */
    public $url;


    public function init($session)
    {
        $this->url = env('KIAS_URL');
        $this->getClient();
        $this->_sId = $session;
    }

    /** Get kias by system credentials
     */
    public function initSystem()
    {
        $this->url = env('KIAS_URL');
        $this->getClient();
        $systemData = $this->authenticate(env('KIAS_LOGIN'), hash('sha512', env('KIAS_PASSWORD')));
        $this->_sId = $systemData->Sid;
    }

    /**
     * Получить Soap-клиент
     * @return SoapClient
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new SoapClient($this->url, [
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace' => 1,
            ]);
        }

        return $this->client;
    }

    public function request($name, $params = []){
        try{
            $xml = new SimpleXMLElement(
                '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
                . $this->client->ExecProc([
                    'pData' => $this->createRequestData($name, $params),
                ])->ExecProcResult->any
            );
        }catch (\SoapFault $exception){
            return $this->request($name, $params);
        }

        if(env('APP_ENV', 'local') !== 'production') {
            if ($name != 'GetDictiList' && $name != 'User_CicHelloSvc' && $name != 'User_CicGetAgrObjectClassList' && $name != 'Auth' && $name != 'GETATTACHMENTDATA') {
                $t = microtime(true) + 6 * 60 * 60;
                $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
                $d = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
                $date = $d->format('d-m-Y_H-i-s-u');
                file_put_contents(
                    storage_path() . "/kias_logs/{$date}_kias_agent_result_{$name}_.xml",
                    $xml->asXml()
                );
            }
        }
        if (isset($xml->error)) {
            if (isset($xml->error->code) && $xml->error->code == '001') {
                $response = $this->authenticate(Auth::user()->username, Auth::user()->password_hash);
                if($response->error){
                    Auth::logout();
                }else{
                    $User = Auth::user();
                    $User->session_id = $response->Sid;
                    $this->_sId = $response->Sid;
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
        if($name == 'Auth'){
            unset($params['Sid']);
        }
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><data></data>');
        $request = $xml->addChild('request');
        $request->addChild('reqName', $name);
        $request->addChild('AppId', static::APP_ID);
        $request->addChild('RequestIp', $_SERVER['REMOTE_ADDR'] ?? '1');
        $request->addChild('UserAgent', $_SERVER['HTTP_USER_AGENT'] ?? '1');
        self::addXmlChildren($request->addChild('params'), $params);
        if(env('APP_ENV', 'local') !== 'production') {
            if($name != 'GetDictiList' && $name != 'User_CicHelloSvc' && $name != 'User_CicGetAgrObjectClassList' && $name != 'Auth'  && $name!='GETATTACHMENTDATA') {
                $t = microtime(true) + 6 * 60 * 60;
                $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
                $d = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
                $date = $d->format('d-m-Y_H-i-s-u');
                file_put_contents(
                    storage_path() . "/kias_logs/" . $date . "_kias_agent_" . $name . "_.xml",
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

    public function authenticate($username, $password)
    {
        return $this->request('Auth', [
            'Name' => $username,
            'Pwd' => $password,
        ]);
    }

    public function authBySystem()
    {
        $response = $this->request('Auth', [
            'Name' => env('KIAS_LOGIN'),
            'Pwd' => hash('sha512', env('KIAS_PASSWORD')),
        ]);
        if($response->error){
            throw new Exception('Authentication failed', '419');
        }

        $this->_sId = $response->Sid;
    }

    public function getBranches()
    {
        return $this->request('User_CicGetUserList',[
            'number' => 1,
        ]);
    }

    public function getUpperLevel($ISN)
    {
        return $this->request('User_CicGetUserLVL', [
            'EmplISN' => $ISN,
        ]);
    }

    public function getEmplInfo($ISN, $dateBeg, $dateEnd)
    {
        return $this->request('User_CicGetEmplInfo', [
            'DateBeg' => $dateBeg,
            'DateEnd' => $dateEnd,
            'EmplISN' => $ISN,
        ]);
    }

    public function getAttachmentData($refisn, $isn, $pictType)
    {
        return $this->request('GETATTACHMENTDATA', [
            'REFISN' => $refisn,
            'ISN' => $isn,
            'PICTTYPE' => $pictType
        ]);
    }

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
            'DocISN' => $docIsn
        ]);
    }

    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark, $Resolution)
    {
        return $this->request('User_CicSetCoordinationList', [
            'DocISN' => $DocISN,
            'EmplISN' => $EmplISN,
            'Solution' => $Solution,
            'Remark' => $Remark,
            'Resolution' => $Resolution == "0" ? "" : $Resolution
        ]);
    }

    public function getAttachmentsList($docIsn){
        return $this->request('User_CicGetAttachmentList', [
            'ISN' => $docIsn,
        ]);
    }

    public function getEmplImagesByDate($date){
        return $this->request('User_CicGetEmplImagesByDate', [
            'Date' => $date,
        ]);
    }

    public function getEmplMotivation($isn, $begin) {
        return $this->request('User_CicGetEmplMotivation', [
            'EmplISN' => $isn,
            'Month' => date('m', strtotime($begin)),
            'Year' => date('Y', strtotime($begin)),
        ]);
    }

    public function GetInfoUser($dateBeg, $dateEnd, $emplIsn){
        return $this->request('User_CicGetUserInfo', [
            'DateBeg' => $dateBeg,
            'DateEnd' => $dateEnd,
            'EmplISN' => $emplIsn,
        ]);
    }

    public function getEmplRating($isn, $begin) {
        return $this->request('User_CicGetEmplRating', [
           'EmplISN' => $isn,
           'Month' => date('m', strtotime($begin)),
           'Year' =>  date('Y', strtotime($begin))
        ]);
    }

    public function getPrintableDocument($isn, $template, $classId){
        return $this->request('GetPrintableDocument', [
            'ISN' => $isn,
            'TemplateISN' => $template,
            'ClassID' => $classId,
        ]);
    }

    public function getCoordinationCount($ISN){
        return $this->request('User_CicCountEmplCoordination', [
            'EmplISN' => $ISN,
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
            'Mode' => 0
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

    public function expressCalculator($ISN, $SubjISN, $addAttr)
    {
        return $this->request('User_CicExpressCalculator', [
            'ProductISN' => $ISN,
            'SubjISN' => $SubjISN,
            'DeptISN' => '1445791',
            'ADDATTR' => [
                'row' => $addAttr
            ]
        ]);
    }

    public function calcFull($order)
    {

        $result = $this->request('User_CicSaveAgrCalc', [
            'ISN' => '',
            'ID' => "TEMP_515431_" . $order['prodIsn'] . "_" . time(),
            'CalcDA'       => $order['calcDA'],
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

    public function createAgrFromAgrCalc($agrCalcIsn){
        return $this->request('User_CicCreateAgrFromAgrCalc',
            ['AgrCalcISN' => $agrCalcIsn ]);
    }

    public function getVehicle($vin = null, $engine = null, $tfNumber = null, $srts = null,$secondSearch = null)
    {
        $kiasMethod = $secondSearch == null ? 'User_CicSearchVehiclesESBD' : 'User_CicSearchTFESBD';
        $result = $this->request($kiasMethod, [
            'MODELISN'  => null,
            'VIN'       => $vin,
            'ENGINEID'  => $vin,
            'TF_NUMBER' => $tfNumber,
            'SRTS'      => $srts,
        ]);
        $result = $secondSearch == null ? $result : $result->ROWSET->row[0];

        if ($result)
            return $result;
    }

    public function saveVehicle($data)
    {
        $data['DATERELEASE'] = '01.12.'.$data['DATERELEASE'];

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

    /**
     * Сохранение прикрплений в киас
     * @param $refisn int исн документа
     * @param $type
     * @param $name string название файла
     * @param $data
     * @return SimpleXMLElement
     */

    public function saveAttachment($refisn, $name, $file, $type = 'J'){
        return $this->request('SAVEATTACHMENT', [
            'REFISN' => $refisn,
            'PICTTYPE' => $type,
            'FILEREMARK' => '',
            'FILENAME' => $name,
            'ACTIVE ' => 'Y',
            'OLEOBJECT' => $file
        ]);
    }

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
}