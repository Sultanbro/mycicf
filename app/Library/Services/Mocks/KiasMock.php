<?php

namespace App\Library\Services\Mocks;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use SoapClient;
use SimpleXMLElement;


class KiasMock implements KiasServiceInterface {
    use WithFaker;

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

    public function __construct() {
        // sleep(1); // sleep здесь для имитации задержки
    }

    public function init($session) {
        $this->url = config('kias.url');
        $this->_sId = $session;
    }

    /** Get kias by system credentials
     */
    public function initSystem() {
        $systemData = $this->authenticate(config('kias.auth.login'), hash('sha512', config('kias.auth.password')));
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
    public function request($name, $params = []) {
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
                if ($response->error) {
                    Auth::logout();
                } else {
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

    public function authenticate($username, $password) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Sid>1</Sid>
        <UserDetails>
            <ISN>5565</ISN>
            <DeptISN>1111</DeptISN>
        </UserDetails>
    </data>
');
    }

    public function authBySystem() {
        $this->_sId = 1;
    }

    public function getBranches() {
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

    public function getUpperLevel($ISN) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <ISN>5565</ISN>
    </data>
');
    }

    public function getEmplInfo($ISN, $dateBeg, $dateEnd) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Mail>mail1@mail.com mail2@mail.com</Mail>
        <MyDays>2</MyDays>
        <CARIER>
            <row>
                <Dept>1111</Dept>
                <datebeg>01.01.2019</datebeg>
                <dateend>01.01.2020</dateend>
                <fullname>xxxxxxxx</fullname>
            </row>
        </CARIER>
        <VACATION>
            <row>
                <fullname>xxxxxxxx</fullname>
                <period>1</period>
                <duration>10</duration>
                <periodvac>10</periodvac>
                <rest>10</rest>
            </row>
        </VACATION>
        <SICK>
            <row>
                <period>1</period>
                <duration>10</duration>
                <remark>Lorem ipsum</remark>
            </row>
        </SICK>
        <ADMINS>
            <row>
                <period>1</period>
                <duration>10</duration>
                <remark>Lorem ipsum</remark>
            </row>
        </ADMINS>
        <THANKS>
            <row>
                <fullname>155</fullname>
                <docdate>01.01.2019</docdate>
                <extrapay>0</extrapay>
                <remark>Lorem ipsum</remark>
            </row>
        </THANKS>
        <MISSION>
            <row>
                <CityName>Almaty</CityName>
                <period>1</period>
                <remark>Lorem ipsum</remark>
            </row>
        </MISSION>
    </data>
');
    }

    public function getAttachmentData($refisn, $isn, $pictType) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
            <data>
                <FILEDATA>' . base64_encode('test') . '</FILEDATA>
            </data>
        ');
    }

    public function myCoordinationList($ISN) {
        // post
        return $this->request('User_CicMyCoordinationList', [
            'DateBeg' => '01.01.1970',
            'DateEnd' => date('d.m.Y', strtotime('tomorrow')),
            'EmplISN' => $ISN,
        ]);
    }

    public function getCoordination($docIsn) {
        // post
        return $this->request('User_CicGetCoordinationList', [
            'DocISN' => $docIsn,
        ]);
    }

    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark, $Resolution) {
        // post
        return $this->request('User_CicSetCoordinationList', [
            'DocISN' => $DocISN,
            'EmplISN' => $EmplISN,
            'Solution' => $Solution,
            'Remark' => $Remark,
            'Resolution' => $Resolution == "0" ? "" : $Resolution,
        ]);
    }

    public function getAttachmentsList($docIsn) {
        // post
        return $this->request('User_CicGetAttachmentList', [
            'ISN' => $docIsn,
        ]);
    }

    public function getEmplImagesByDate($date) {
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

    public function getEmplMotivation($isn, $begin) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Category>1</Category>
        <Mot>
            <row>
                <MotSum>100.0</MotSum>
                <PercPlan>100.0</PercPlan>
                <PlanFM>100.0</PlanFM>
                <TotalProcKV>100.0</TotalProcKV>
                <NetFees>100.0</NetFees>
                <MotProc>100.0</MotProc>
                <DZ>100.0</DZ>
                <SumPVTSF>100.0</SumPVTSF>
            </row>
        </Mot>
    </data>
');
    }

    public function GetInfoUser($dateBeg, $dateEnd, $emplIsn) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
    </data>
');
    }

    public function getEmplRating($user_isn, $begin_date) {
        // not used
        return $this->request('User_CicGetEmplRating', [
            'EmplISN' => $user_isn,
            'Month' => date('m', strtotime($begin_date)),
            'Year' => date('Y', strtotime($begin_date)),
        ]);
    }

    public function getPrintableDocument($isn, $template, $classId) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Bytes>' . base64_encode('12312') . '</Bytes>
        <FileName>1.txt</FileName>
    </data>
');
    }

    public function getExpressAttributes($product) {
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

    public function getFullObject($product) {
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

    public function getDictiList($parent) {
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

    public function getRegions($parent) {
        // not used
        return $this->request('User_CicGetRegionsAndCity', [
            'region' => $parent
        ]);
    }

    public function getSubject($firstName, $lastName, $patronymic, $iin) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
            <EXTSYSTEMKEY></EXTSYSTEMKEY>
            <ISN>111444</ISN>
            <IIN>900511333222111</IIN>
            <FIRSTNAME></FIRSTNAME>
            <LASTNAME></LASTNAME>
            <PARENTNAME></PARENTNAME>
            <ORGNAME></ORGNAME>
            <JURIDICAL></JURIDICAL>
            <DOCCLASSISN></DOCCLASSISN>
            <DOCNO></DOCNO>
            <DOCDATE></DOCDATE>
            <EMAIL></EMAIL>
            <PHONE></PHONE>
            <BIRTHDAY></BIRTHDAY>
            <SEXID></SEXID>
            <OKVDNAME></OKVDNAME>
            <ECONOMICNAME></ECONOMICNAME>
        </row>
    </ROWSET>
</data>

        ');
    }

    public function saveSubject($participant) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    public function setSubject($participant) {
        // not used
        return $this->request('User_CicSetSubject', array_merge($participant, [
                'RESIDENT' => "Y",
                'COUNTRYISN' => "9515"
            ])
        );
    }

    public function expressCalculator($ISN, $SubjISN, $addAttr, $nshb) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<AgrISN>555666</AgrISN>
</data>
        ');
    }

    public function CreateAgrByAgrcalc($isn) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<AgrISN>555666</AgrISN>
</data>
        ');
    }

    public function getAgreementCalc($isn, $product_id) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<AgreementCalc>
    <row>
        <ID>1</ID>
        <AGREEMENT_ADDATTR>
            <row>
                <ATTRISN>1</ATTRISN>
                <TYPEVALUE>CHECKBOX</TYPEVALUE>
                <VAL>1</VAL>
            </row>
        </AGREEMENT_ADDATTR>
        <AGROBJECT></AGROBJECT>
        <AGRCLAUSE></AGRCLAUSE>
    </row>
</AgreementCalc>
</data>
        ');
    }

    public function calcFull($order) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<PremiumSum>100.0</PremiumSum>
<AgrCalcISN>100</AgrCalcISN>
<CalcID>100</CalcID>
<RequestISN>100</RequestISN>
<RequestID>1</RequestID>
</data>
        ');
    }

    public function sendtoExpertSakta($isn, $dateTime, $address) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>OK</data>
        ');
    }

    public function sendtoExpert($isn, $dateTime, $address) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>OK</data>
        ');
    }

    public function createAgrFromAgrCalc($agrCalcIsn) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <AgrISN>123</AgrISN>
    <AgrID>1</AgrID>
</data>
        ');
    }

    public function getVehicle($vin = null, $engine = null, $tfNumber = null, $srts = null, $searchTFESBD = null) {
        // not used
        $kiasMethod = $searchTFESBD == null ? 'User_CicSearchVehiclesESBD' : 'User_CicSearchTFESBD';
        $result = $this->request($kiasMethod, [
            'MODELISN' => null,
            'VIN' => $vin,
            'ENGINEID' => $engine,
            'TF_NUMBER' => $tfNumber,
            'SRTS' => $srts,
        ]);
        $result = $searchTFESBD == null ? $result : $result->ROWSET->row[0];

        if ($result)
            return $result;
    }

    public function saveVehicle($data) {
        // not used
        $data['DATERELEASE'] = '01.01.' . $data['DATERELEASE'];

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

    public function getPrintableDocumentList($contract_number) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>

        </row>
    </ROWSET>
</data>
        ');
    }

    public function getAgrStatus($ISN) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Product></Product>
    <StatusISN></StatusISN>
    <Status></Status>
</data>
        ');
    }

    public function getOrSetDocs($doc_isn, $type, $status) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Status></Status>
</data>
        ');
    }

    public function getCoordinationCount($ISN) {
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
    public function getInsuranceInspectionList($isn, $status, $DateBeg, $DateEnd) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<Request>6</Request>
</data>
        ');
    }

    /**
     * @param $agrisn
     * @param $agrcalcisn
     * @param $isn
     * @param $docIsn
     *
     * @return mixed|SimpleXMLElement
     */
    public function getInsuranceInspectionInfo($agrisn, $agrcalcisn, $isn, $docIsn) {
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
    public function setInsuranceInspectionInfo($docIsn, $dremark, $data) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
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
    public function setAppointmentOperator($emplIsn, $docIsn, $statusIsn, $remark) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    public function getAttachmentPath($type, $refID, $format, $docClass, $refISN, $ISN) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
            <FILEPATH></FILEPATH>
            <ISN></ISN>
        </row>
    </ROWSET>
</data>
        ');
    }

    public function cicSaveEDS($RefISN, $isn, $iin, $signer, $signerisn, $signeddate, $keyperiod, $remark) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    /**
     * Получить справочники
     *
     * @param $dictiISN
     * @param $mode
     *
     * @return SimpleXMLElement
     */
    public function getDictList($dictiISN, $mode) {
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

    public function getDictiProducts($ISN) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <ROWSET>
        <row>
           <ISN>1234</ISN>
           <FULLNAME>FULLNAME</FULLNAME>
           <PARENTISN>666</PARENTISN>
           <N_KIDS>1</N_KIDS>
        </row>
    </ROWSET>
</data>
        ');
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
    public function saveAttachment($refisn, $name, $file, $type = 'J') {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    /**
     * @param $deptIsn
     *
     * @return mixed|SimpleXMLElement
     */
    public function getAvarkomByDept($deptIsn) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Avarcoms></Avarcoms>
</data>
        ');
    }


    public function getUnderReport($productInfo, $emplIsn, $dateBeg, $dateEnd) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <CALC1>
        <row>
            <product></product>
            <ptype></ptype>
        </row>
    </CALC1>
    <CALC2>
        <row>
            <product></product>
            <ptype></ptype>
        </row>
    </CALC2>
    <CALC3>
        <row>
            <dept></dept>
            <quantity></quantity>
        </row>
    </CALC3>
    <GEN>
        <row>
            <AllReq></AllReq>
            <done></done>
            <rejected></rejected>
            <onwork></onwork>
            <agr></agr>
        </row>
    </GEN>
</data>
        ');
    }

    /**
     * @param $class_isn
     * @param $doc_isn
     * @return mixed|SimpleXMLElement
     */
    public function getDocRowAttr($class_isn, $doc_isn) {
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    public function getDocRating($class_isn) {
        // not used
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }
}
