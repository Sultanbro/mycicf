<?php

namespace App\Library\Services\Mocks;

use App\Debug\KiasRequestCollector;
use App\Library\Services\KiasServiceInterface;
use Debugbar;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use SoapClient;
use SimpleXMLElement;

class KiasMock implements KiasServiceInterface {
    use WithFaker;

    /**
     * @var KiasMock
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

    /**
     * @var bool
     */
    private $initialized = false;

    /**
     * @var bool
     */
    private $systemInitialized = false;

    private $delay;

    /**
     * @var KiasRequestCollector
     */
    private $collector;

    public function __construct() {
        Debugbar::log('KiasMock::Construct');
        $this->delay = (float)config('kias.mock.delay');
        $this->collector = \Debugbar::getCollector('kias');
    }

    private function delay() {
        if ($this->delay > 0) {
            usleep($this->delay * 1000000);
            Debugbar::info('KiasMock::delay');
        }
    }

    public function init($session) {
        if ($this->initialized) {
            Debugbar::log('KiasMock - Tried to initialize it second time');
            return;
        }

        $this->delay();

        Debugbar::log('KiasMock -  Init');
        $this->url = config('kias.url');
        $this->_sId = $session;

        $this->initialized = true;
    }

    /**
     * Get kias by system credentials
     */
    public function initSystem() {
        if ($this->systemInitialized) {
            Debugbar::log('KiasMock - Tried to initialize the system second time');
            return;
        }

        Debugbar::log('KiasMock - Init System');
        // sleep(1); // sleep здесь для имитации задержки
        $this->url = config('kias.url');

        $username = config('kias.auth.login');
        $password = config('kias.auth.password');
        $passwordHash = hash('sha512', $password);

        $systemData = $this->authenticate($username, $passwordHash);

        $this->_sId = $systemData->Sid;

        $this->systemInitialized = true;
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
        $this->delay();
        Debugbar::log('KiasMock::Request [' . $name . ' :: ' . json_encode($params) . ']');
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

    /**
     * @param string $username
     * @param string $password
     * @return \App\XML\Kias\AuthenticateResult
     */
    public function authenticate($username, $password) {
        $this->collector->push([
            'method' => 'authenticate',
            'args' => collect('username'),
        ]);
        $this->delay();
        return new \App\XML\Kias\AuthenticateResult('<?xml version="1.0" encoding="utf-8"?>
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
        $this->collector->push([
            'method' => 'authBySystem',
        ]);
        $this->delay();
        $this->_sId = 1;
    }

    /**
     * @return \App\XML\Kias\GetBranchesResult|SimpleXMLElement
     */
    public function getBranches() {
        $this->collector->push([
            'method' => 'getBranches',
        ]);
        $this->delay();
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

    /**
     * @param $ISN
     * @return \App\XML\Kias\GetUpperLevelResult|SimpleXMLElement
     */
    public function getUpperLevel($ISN) {
        $this->collector->push([
            'method' => 'getUpperLevel',
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <ISN>5565</ISN>
    </data>
');
    }

    /**
     * @param $ISN
     * @param $dateBeg
     * @param $dateEnd
     * @return \App\XML\Kias\GetEmplInfoResult|SimpleXMLElement
     */
    public function getEmplInfo($ISN, $dateBeg, $dateEnd) {
        $this->collector->push([
            'method' => 'getEmplInfo',
        ]);
        $this->delay();
        //sleep(1); // sleep здесь для имитации задержки
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
        <Duty>Test duty</Duty>
        <Name>Developer</Name>
        <Birthday>01 января 1991</Birthday>
    </data>
');
    }

    /**
     * @param $refisn
     * @param $isn
     * @param $pictType
     * @return \App\XML\Kias\GetAttachmentDataResult|SimpleXMLElement
     */
    public function getAttachmentData($refisn, $isn, $pictType) {
        $this->collector->push([
            'method' => 'getAttachmentData',
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
            <data>
                <FILEDATA>' . base64_encode('test') . '</FILEDATA>
            </data>
        ');
    }

    /**
     * @param $ISN
     * @return \App\XML\Kias\MyCoordinationListResult|SimpleXMLElement
     */
    public function myCoordinationList($ISN) {
        $this->collector->push([
            'method' => 'myCoordinationList',
            'ISN' => $ISN,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
            <data>
                <AC>
                    <row>
                        <ISN>5565</ISN>
                        <type>1</type>
                        <curator>1</curator>
                        <DeptName>1</DeptName>
                        <id>1</id>
                        <docdate>01.01.2021</docdate>
                        <ClassPovestka>1</ClassPovestka>
                        <Povestka>1</Povestka>
                    </row>
                </AC>
                <SP>
                    <row>
                        <ISN>5565</ISN>
                        <type></type>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                    </row>
                </SP>
                <SZ>
                    <row>
                        <ISN>5565</ISN>
                        <type></type>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                        <SzISN></SzISN>
                        <SzClassISN></SzClassISN>
                    </row>
                </SZ>
                <KV>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                    </row>
                </KV>
                <OL>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                        <DeptName></DeptName>
                    </row>
                </OL>
                <AD>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <id>1</id>
                        <period>1</period>
                        <docdate>01.01.2021</docdate>
                        <days></days>
                    </row>
                </AD>
                <RV>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docpaydate>01.01.2021</docpaydate>
                    </row>
                </RV>
                <BK>
                    <row>
                        <ISN>5565</ISN>
                        <type></type>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                    </row>
                </BK>
                <other>
                    <row>
                        <ISN>5565</ISN>
                        <Type></Type>
                        <curator></curator>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                        <DeptName></DeptName>
                        <ClassISN></ClassISN>
                        <RefDocISN></RefDocISN>
                        <RefClassISN></RefClassISN>
                    </row>
                </other>
            </data>
        ');
    }

    public function getCoordination($docIsn) {
        $this->collector->push([
            'method' => 'getCoordination',
            'docIsn' => $docIsn,
        ]);
        $this->delay();
        // post
        return $this->request('User_CicGetCoordinationList', [
            'DocISN' => $docIsn,
        ]);
    }

    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark, $Resolution) {
        $this->collector->push([
            'method' => 'setCoordination',
            'DocISN' => $DocISN,
            'EmplISN' => $EmplISN,
            'Solution' => $Solution,
            'Remark' => $Remark,
            'Resolution' => $Resolution,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getAttachmentsList',
            'docIsn' => $docIsn,
        ]);
        $this->delay();
        // post
        return $this->request('User_CicGetAttachmentList', [
            'ISN' => $docIsn,
        ]);
    }

    public function getEmplImagesByDate($date) {
        $this->collector->push([
            'method' => 'getEmplImagesByDate',
            'date' => $date,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getEmplMotivation',
            'isn' => $isn,
            'begin' => $begin,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'GetInfoUser',
            'dateBeg' => $dateBeg,
            'dateEnd' => $dateEnd,
            'emplIsn' => $emplIsn,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
    </data>
');
    }

    public function getEmplRating($user_isn, $begin_date) {
        $this->collector->push([
            'method' => 'getEmplRating',
            'user_isn' => $user_isn,
            'begin_date' => $begin_date,
        ]);
        $this->delay();
        // not used
        return $this->request('User_CicGetEmplRating', [
            'EmplISN' => $user_isn,
            'Month' => date('m', strtotime($begin_date)),
            'Year' => date('Y', strtotime($begin_date)),
        ]);
    }

    public function getPrintableDocument($isn, $template, $classId) {
        $this->collector->push([
            'method' => 'getPrintableDocument',
            'isn' => $isn,
            'template' => $template,
            'classId' => $classId,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <data>
        <Bytes>' . base64_encode('12312') . '</Bytes>
        <FileName>1.txt</FileName>
    </data>
');
    }

    public function getExpressAttributes($product) {
        $this->collector->push([
            'method' => 'getExpressAttributes',
            'product' => $product,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getFullObject',
            'product' => $product,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getDictiList',
            'parent' => $parent,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getRegions',
            'parent' => $parent,
        ]);
        $this->delay();
        // not used
        return $this->request('User_CicGetRegionsAndCity', [
            'region' => $parent
        ]);
    }

    public function getSubject($firstName, $lastName, $patronymic, $iin) {
        $this->collector->push([
            'method' => 'getSubject',
            'firstName' => $firstName,
            'lastName' => $lastName,
            'patronymic' => $patronymic,
            'iin' => $iin,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'saveSubject',
            'participant' => $participant,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    public function setSubject($participant) {
        $this->collector->push([
            'method' => 'setSubject',
            'participant' => $participant,
        ]);
        $this->delay();
        // not used
        return $this->request('User_CicSetSubject', array_merge($participant, [
                'RESIDENT' => "Y",
                'COUNTRYISN' => "9515"
            ])
        );
    }

    public function expressCalculator($ISN, $SubjISN, $addAttr, $nshb) {
        $this->collector->push([
            'method' => 'expressCalculator',
            'ISN' => $ISN,
            'SubjISN' => $SubjISN,
            'addAttr' => $addAttr,
            'nshb' => $nshb,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<AgrISN>555666</AgrISN>
</data>
        ');
    }

    public function CreateAgrByAgrcalc($isn) {
        $this->collector->push([
            'method' => 'CreateAgrByAgrcalc',
            'isn' => $isn,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
<AgrISN>555666</AgrISN>
</data>
        ');
    }

    public function getAgreementCalc($isn, $product_id) {
        $this->collector->push([
            'method' => 'getAgreementCalc',
            'isn' => $isn,
            'product_id' => $product_id,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'calcFull',
            'order' => $order,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'sendtoExpertSakta',
            'isn' => $isn,
            'dateTime' => $dateTime,
            'address' => $address,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>OK</data>
        ');
    }

    public function sendtoExpert($isn, $dateTime, $address) {
        $this->collector->push([
            'method' => 'sendtoExpert',
            'isn' => $isn,
            'dateTime' => $dateTime,
            'address' => $address,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>OK</data>
        ');
    }

    public function createAgrFromAgrCalc($agrCalcIsn) {
        $this->collector->push([
            'method' => 'createAgrFromAgrCalc',
            'agrCalcIsn' => $agrCalcIsn,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <AgrISN>123</AgrISN>
    <AgrID>1</AgrID>
</data>
        ');
    }

    public function getVehicle($vin = null, $engine = null, $tfNumber = null, $srts = null, $searchTFESBD = null) {
        $this->collector->push([
            'method' => 'getVehicle',
            'vin' => $vin,
            'engine' => $engine,
            'tfNumber' => $tfNumber,
            'srts' => $srts,
            'searchTFESBD' => $searchTFESBD,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'saveVehicle',
            'data' => $data,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getPrintableDocumentList',
            'contract_number' => $contract_number,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getAgrStatus',
            'ISN' => $ISN,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Product></Product>
    <StatusISN></StatusISN>
    <Status></Status>
</data>
        ');
    }

    public function getOrSetDocs($doc_isn, $type, $status) {
        $this->collector->push([
            'method' => 'getOrSetDocs',
            'doc_isn' => $doc_isn,
            'type' => $type,
            'status' => $status,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Status></Status>
</data>
        ');
    }

    public function getCoordinationCount($ISN) {
        $this->collector->push([
            'method' => 'getCoordinationCount',
            'ISN' => $ISN,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getInsuranceInspectionList',
            'isn' => $isn,
            'status' => $status,
            'DateBeg' => $DateBeg,
            'DateEnd' => $DateEnd,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getInsuranceInspectionInfo',
            'agrisn' => $agrisn,
            'agrcalcisn' => $agrcalcisn,
            'isn' => $isn,
            'docIsn' => $docIsn,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'setInsuranceInspectionInfo',
            'docIsn' => $docIsn,
            'dremark' => $dremark,
            'data' => $data,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'setAppointmentOperator',
            'emplIsn' => $emplIsn,
            'docIsn' => $docIsn,
            'statusIsn' => $statusIsn,
            'remark' => $remark,
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    public function getAttachmentPath($type, $refID, $format, $docClass, $refISN, $ISN) {
        $this->collector->push([
            'method' => 'getAttachmentPath',
            'type' => $type,
            'refID' => $refID,
            'format' => $format,
            'docClass' => $docClass,
            'refISN' => $refISN,
            'ISN' => $ISN,
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'cicSaveEDS',
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getDictList',
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getDictiProducts',
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'saveAttachment',
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getAvarkomByDept',
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
    <Avarcoms></Avarcoms>
</data>
        ');
    }


    public function getUnderReport($productInfo, $emplIsn, $dateBeg, $dateEnd) {
        $this->collector->push([
            'method' => 'getUnderReport',
        ]);
        $this->delay();
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
        $this->collector->push([
            'method' => 'getDocRowAttr',
        ]);
        $this->delay();
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }

    public function getDocRating($class_isn) {
        $this->collector->push([
            'method' => 'getDocRating',
        ]);
        $this->delay();
        // not used
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<data>
</data>
        ');
    }
}
