<?php
/**
 * Created by PhpStorm.
 * User: IAkbergen
 * Date: 12.04.2019
 * Time: 17:14
 */

namespace App\Library\Services;

use Illuminate\Support\Facades\Auth;
use SoapClient;
use SimpleXMLElement;


class KiasMock implements KiasServiceInterface
{
    const APP_ID = 868281;
    const ACTIVE = 'Y';

    public $username;
    public $password;
    /**
     * @var SoapClient
     *
     * @deprecated
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


    public function init($session)
    {
        $this->url = env('KIAS_URL');
        $this->_sId = $session;
    }

    /** Get kias by system credentials
     */
    public function initSystem()
    {
        $systemData = $this->authenticate(env('KIAS_LOGIN'), hash('sha512', env('KIAS_PASSWORD')));
        $this->_sId = $systemData->Sid;
    }

    /**
     * @param $name
     * @param array $params
     * @return SimpleXMLElement
     * @throws \Exception
     *
     * @deprecated
     */
    public function request($name, $params = [])
    {
        if ($name === 'User_CicHelloSvc') {
            return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
                <data>
                </data>
            ');
        }
        dd($name, $params);
        throw new \Exception('DEPRECATED');
        try {
            $xml = new SimpleXMLElement(
                $this->createRequestData($name, $params)
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

    public function authenticate($username, $password)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Sid>1</Sid>
    </data>
');
    }

    public function authBySystem()
    {
        $this->_sId = 1;
    }

    public function getBranches()
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <LIST>
            <row>
                <FullName>Developer</FullName>
                <ISN>5565</ISN>
                <ParentISN>55651</ParentISN>
                <Kids>1</Kids>
                <Duty>Duty</Duty>
                <Birthday>1991-05-22</Birthday>
            </row>
        </LIST>
    </data>
');
    }

    public function getUpperLevel($ISN)
    {
        return $this->request('User_CicGetUserLVL', [
            'EmplISN' => $ISN,
        ]);
    }

    public function getEmplInfo($ISN, $dateBeg, $dateEnd)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Mail>mail1@mail.com mail1@mail.com</Mail>
    </data>
');
    }

    public function getAttachmentData($refisn, $isn, $pictType)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
            <data>
                <FILEDATA>'. base64_encode('test').'</FILEDATA>
            </data>
        ');
    }

    public function myCoordinationList($ISN)
    {
        // post
        return $this->request('User_CicMyCoordinationList', [
            'DateBeg' => '01.01.1970',
            'DateEnd' => date('d.m.Y', strtotime('tomorrow')),
            'EmplISN' => $ISN,
        ]);
    }

    public function getCoordination($docIsn)
    {
        // post
        return $this->request('User_CicGetCoordinationList', [
            'DocISN' => $docIsn,
        ]);
    }

    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark, $Resolution)
    {
        // post
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
        // post
        return $this->request('User_CicGetAttachmentList', [
            'ISN' => $docIsn,
        ]);
    }

    public function getEmplImagesByDate($date)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <images>
            <row>
                <SubjISN>12345</SubjISN>
                <RefISN>12345</RefISN>
            </row>
            <row>
                <SubjISN>12345</SubjISN>
                <RefISN>12345</RefISN>
            </row>
        </images>
    </data>
');
    }

    public function getEmplMotivation($isn, $begin)
    {
        // post
        return $this->request('User_CicGetEmplMotivation', [
            'EmplISN' => $isn,
            'Month'   => date('m', strtotime($begin)),
            'Year'    => date('Y', strtotime($begin)),
        ]);
    }

    public function GetInfoUser($dateBeg, $dateEnd, $emplIsn)
    {
        // post
        return $this->request('User_CicGetUserInfo', [
            'DateBeg' => $dateBeg,
            'DateEnd' => $dateEnd,
            'EmplISN' => $emplIsn,
        ]);
    }

    public function getEmplRating($user_isn, $begin_date)
    {
        // not used
        return $this->request('User_CicGetEmplRating', [
            'EmplISN' => $user_isn,
            'Month'   => date('m', strtotime($begin_date)),
            'Year'    => date('Y', strtotime($begin_date)),
        ]);
    }

    public function getPrintableDocument($isn, $template, $classId)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Bytes>'.base64_encode('12312').'</Bytes>
        <FileName>1.txt</FileName>
    </data>
');
    }

    public function getExpressAttributes($product){
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
            <NumCode>1155</NumCode>
            <AttrName>1111</AttrName>
            <TypeValue>ATTR</TypeValue>
        </row>
    </ROWSET>
</data>

        ');
    }

    public function getFullObject($product){
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Object>
        <row>
            <classobjisn>1155</classobjisn>
            <subclassobjisn>1111</subclassobjisn>
            <classobjname>class</classobjname>
            <subclassobjname>subclass</subclassobjname>
            <ObjAttr>
                <row>
                    <AttrISN>111</AttrISN>
                    <TypeValue>111</TypeValue>
                    <Label>mylabel</Label>
                    <NumCode>555</NumCode>
                    <Required>0</Required>
                    <ReadOnly>0</ReadOnly>
                </row>
            </ObjAttr>
        </row>
    </Object>
    <RiskPack>
        <row>
            <FranchSum>
                <row>
                    <RiskPackisn>1111</RiskPackisn>
                    <Franch>1111</Franch>
                </row>
            </FranchSum>
            <FranchProc>
                <row>
                    <uFranchProc>,5</uFranchProc>
                    <cFranchProc>,5</cFranchProc>
                </row>
            </FranchProc>
            <ClassObjISN>777</ClassObjISN>
            <InsClassisn>777</InsClassisn>
            <InsClassname>777</InsClassname>
            <RiskPackisn>777</RiskPackisn>
            <RiskPackname>444</RiskPackname>
        </row>
    </RiskPack>
</data>

        ');
    }

    public function getDictiList($parent)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
            <ISN>1155</ISN>
            <AttrName>1111</AttrName>
            <TypeValue>ATTR</TypeValue>
        </row>
    </ROWSET>
</data>

        ');
    }

    public function getRegions($parent){
        // not used
        return $this->request('User_CicGetRegionsAndCity', [
            'region' => $parent
        ]);
    }

    public function getSubject($firstName, $lastName, $patronymic, $iin)
    {
        // post
        return $this->request('User_CicSearchSubject', [
            'IIN'          => $iin,
            'FIRSTNAME'    => $firstName,
            'LASTNAME'     => $lastName,
            'PARENTNAME'   => $patronymic,
        ]);
    }

    public function saveSubject($participant){
        // post
        return $this->request('User_CicSaveSubject', array_merge($participant,[
                'RESIDENT' => "Y",
                'COUNTRYISN' => "9515"
            ])
        );
    }

    public function setSubject($participant){
        // not used
        return $this->request('User_CicSetSubject', array_merge($participant,[
                'RESIDENT' => "Y",
                'COUNTRYISN' => "9515"
            ])
        );
    }

    public function expressCalculator($ISN, $SubjISN, $addAttr, $nshb)
    {
        // post
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
        // post
        return $this->request('CreateAgrByAgrcalc', [
            'CalcISN' => $isn,
            'MODE' => 0
        ]);
    }

    public function getAgreementCalc($isn,$product_id){
        // post
        return $this->request('GETAGREEMENTCALC', [
            'AGREEMENTCALCISN' => $isn,
            'PRODUCTISN' => $product_id
        ]);
    }

    public function calcFull($order)
    {
        // post
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
        // post
        return $this->request('User_CicSendtoExpertSakta', [
            'AGRISN' => $isn,
            'DATE' => $dateTime,
            'ADDRESS' => $address
        ]);
    }

    public function sendtoExpert($isn,$dateTime,$address){
        // post
        return $this->request('User_CicSendtoExpert', [
            'AGRISN'    => $isn,
            'DATE'  => $dateTime,
            'ADDRESS' => $address
        ]);
    }

    public function createAgrFromAgrCalc($agrCalcIsn){
        // post
        return $this->request('User_CicCreateAgrFromAgrCalc',
            ['AgrCalcISN' => $agrCalcIsn ]);
    }

    public function getVehicle($vin = null, $engine = null, $tfNumber = null, $srts = null,$searchTFESBD = null)
    {
        // not used
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
        // not used
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
        // post
        return $this->request('User_CicGetPrintableDocumentList', [
            'AgrISN' => $contract_number,
            'TemplateISN' => ''
        ]);
    }

    public function getAgrStatus($ISN){
        // post
        return $this->request('User_CicGetAgrCalcStatus',[
            'AgrID' => $ISN
        ]);
    }

    public function getOrSetDocs($doc_isn, $type, $status){
        // post
        return $this->request('User_CicGetOrSetDocs',[
            'DocISN' => $doc_isn,
            'Type' => $type, // 1 сменить статус, 2 посмотреть статус
            'Status' => $status, //2522 на подписи, 2518 подписан
        ]);
    }

    public function getCoordinationCount($ISN)
    {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<MyCoord>6</MyCoord>
</data>

        ');
    }

    /**
     * @param $isn
     *
     * @return mixed|SimpleXMLElement
     */
    public function getInsuranceInspectionList($isn, $status, $DateBeg, $DateEnd)
    {
        // post
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
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
            <details>
                <row>
                    <el>
                        <detailisn>5565</detailisn>
                        <detail>Developer</detail>
                        <dicti>Developer</dicti>
                    </el>

                </row>
            </details>
        </row>
    </ROWSET>
</data>

        ');
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
        // post
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
        // post
        return $this->request('User_CicSetOsmotrRequest', [
            'OperatorISN' => $emplIsn,
            'RequestISN'  => $docIsn,
            'StatusISN'   => $statusIsn,
            'Remark'      => $remark,
        ]);
    }

    public function getAttachmentPath($type,$refID,$format,$docClass,$refISN,$ISN){

        // post
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
        // post
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
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
           <ISN>1234</ISN>
           <FULLNAME>FULLNAME</FULLNAME>
           <detailisn>666</detailisn>
        </row>
    </ROWSET>
</data>

        ');
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
}
