<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

class AmazonController extends Controller
{
    public function getData(Request $request, $table){
        $start = time();
        $upd = date('d.m.Y H:i:s', strtotime($request->updated));
        $table = ucfirst(strtolower($table));
        $query = $this->{"get$table"}($upd);
        $result = DB::connection('oracle')->select($query);
        $end = time();
        $this->temp($result, 'client');
    }
    public function getKommeskData(Request $request, $table){
        $start = time();
        $upd = date('d.m.Y H:i:s', strtotime($request->updated));
        $table = ucfirst(strtolower($table));
        $query = $this->{"get$table"}($upd);
        $result = DB::connection('kommesk')->select($query);
        $end = time();
        $this->temp($result, 'client');
    }

    public function test(){
        $res = DB::connection('kommesk')->select("select * from inslab.subject where rownum < 10");
        dd($res);
    }
    public function getSubevent($updated){
        return "select 
ISN, DEPTISN, EMPLISN, CREATED, CREATEDBY, CREATEDDEPTISN, 
UPDATED, UPDATEDBY, CATEGORYISN, CLASSISN, DATEBEG, DATEEND,
IMPORTANT, STATUS, OPTIONS, REMINDERBEFORE, 
translate(THEME,'\|/-'||CHR(10)||CHR(13), '      ')THEME,
translate(REMARK,'\|/-'||CHR(10)||CHR(13), '      ')REMARK,
RESULTISN, SUBJISN, AGRISN, CLAIMISN, DOCISN, REGRESSISN,
AGRCALCISN, SALVAGEISN, BUSINESSPROCISN, EVENTTYPE, 
RECURRENCEINDEX, PARENTISN,
translate(PHONE,'\|/-'||CHR(10)||CHR(13), '      ')PHONE,
translate(EXTSYSTEMKEY,'\|/-'||CHR(10)||CHR(13), '      ')EXTSYSTEMKEY,
REFCLASSISN, PREVISN, 
translate(EMAILFROM,'\|/-'||CHR(10)||CHR(13), '      ')EMAILFROM,
translate(EMAILTO,'\|/-'||CHR(10)||CHR(13), '      ')EMAILTO,
CALLREQUESTISN
from inslab.subevent 
where updated > to_date('$updated','dd.mm.YYYY HH24:MI:SS')";
    }

    public function getAgrcond($updated){
        return "select 
isn, agrisn, objisn, 
translate(condname, CHR(10)||CHR(13)||'/|\-', '      ') condname,
riskisn,
translate(riskname, CHR(10)||CHR(13)||'/|\-', '      ') riskname,
insclassisn, addendumisn, datesign, datebeg, dateend, datedenounce,
duration, currisn, currsumisn, limitsum, limitsumext, discount,
translate(tariffstr, CHR(10)||CHR(13)||'/|\-', '      ') tariffstr,
premiumsum, franchtype, franchtariff, franchsum, COMISSIONPROC,
COMISSIONSUM,
translate(remark, CHR(10)||CHR(13)||'/|\-', '      ') remark,
fid, updated,
updatedby, parentisn, limitsumtype, paymentkoeff,
premiumsumtariff, created, 
createdby, reasoncancelisn, previsn
from inslab.agrcond 
where updated > to_date('$updated','dd.mm.YYYY HH24:MI:SS')";
    }

    public function getAgrclause($updated){
        return "Select 
        isn, agrisn, orderno, clauseisn, classisn, 
        TRANSLATE(remark,CHR(10)||CHR(13)||'/|\-' ,'      ') remark,
        updated, updatedby
        from inslab.AgrClause
        where updated > to_date('$updated','dd.mm.YYYY HH24:MI:SS')";
    }

    public function getAgrclaim($updated){
        return "select ISN,CLASSISN,DEPTISN,EMPLISN,DECLARANTISN,
FORMISN,
translate(ID,'\|/-'||CHR(10)||CHR(13), '      ')ID,
translate(EXTID,'\|/-'||CHR(10)||CHR(13), '      ')EXTID,
STATUS,
translate(DESCRIPTION,'\|/-'||CHR(10)||CHR(13), '      ')DESCRIPTION,
DATECLAIM,DATEREG,DATESOLUTION,CLAIMSUM,REFUNDSUM,
REJECTSUM,CURRISN,AGRISN,CONDISN,CHANNELISN,COUNTRYISN,
translate(POSTCODE,'\|/-'||CHR(10)||CHR(13), '      ')POSTCODE,
CITYISN,STREETISN,
translate(STREET,'\|/-'||CHR(10)||CHR(13), '      ')STREET,
translate(HOUSE,'\|/-'||CHR(10)||CHR(13), '      ')HOUSE,
translate(ADDRSTR,'\|/-'||CHR(10)||CHR(13), '      ')ADDRSTR,
PLACECLASSISN,DRIVERISN,
translate(REMARK,'\|/-'||CHR(10)||CHR(13), '      ')REMARK,
translate(ID1C,'\|/-'||CHR(10)||CHR(13), '      ')ID1C,
UPDATED,UPDATEDBY,ACCIDENTMODEISN,CREATED,CREATEDBY,TIMECLAIM,SCHEMEISN,
translate(SCHEMECARAB,'\|/-'||CHR(10)||CHR(13), '      ')SCHEMECARAB,
translate(ISDECLAREDGIBDD,'\|/-'||CHR(10)||CHR(13), '      ')ISDECLAREDGIBDD,
translate(LATITUDE,'\|/-'||CHR(10)||CHR(13), '      ')LATITUDE,
translate(LONGITUDE,'\|/-'||CHR(10)||CHR(13), '      ')LONGITUDE,
translate(EXTSYSTEMKEY,'\|/-'||CHR(10)||CHR(13), '      ')EXTSYSTEMKEY,
FRONTNODEISN,SYSTEMISN,ISVIDEOFIXATION,ISDISAGREE,NUMPARTICIPANT
from inslab.agrclaim
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getAgrobjaddr($updated){
        return "select 
isn, objisn, countryisn, 
translate(postcode, CHR(10)||CHR(13)||'/|\-', '      ') postcode, 
translate(district, CHR(10)||CHR(13)||'/|\-', '      ') district,
cityisn, streetisn, 
translate(street, CHR(10)||CHR(13)||'/|\-', '      ') street, 
translate(house, CHR(10)||CHR(13)||'/|\-', '      ') house,
translate(building, CHR(10)||CHR(13)||'/|\-', '      ') building,
translate(flat, CHR(10)||CHR(13)||'/|\-', '      ') flat,
translate(address, CHR(10)||CHR(13)||'/|\-', '      ') address,
updated, updatedby,
translate(fiasaoguid, CHR(10)||CHR(13)||'/|\-', '      ') fiasaoguid,
translate(fiashouseguid, CHR(10)||CHR(13)||'/|\-', '      ') fiashouseguid,
translate(fiassteadguid, CHR(10)||CHR(13)||'/|\-', '      ') fiasteadguid
from inslab.agrobjaddr
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getDicti($updated){
        return "select 
isn, parentisn,
translate(code,'\|/-'||CHR(10)||CHR(13), '      ')code,
translate(numcode,'\|/-'||CHR(10)||CHR(13), '      ')numcode,
translate(shortname,'\|/-'||CHR(10)||CHR(13), '      ')shortname,
translate(fullname,'\|/-'||CHR(10)||CHR(13), '      ')fullname,
translate(tablename,'\|/-'||CHR(10)||CHR(13), '      ')tablename,
translate(constname,'\|/-'||CHR(10)||CHR(13), '      ')constname,
translate(n_kids,'\|/-'||CHR(10)||CHR(13), '      ')n_kids,
translate(active,'\|/-'||CHR(10)||CHR(13), '      ')active,
updated,updatedby,
translate(userconstname,'\|/-'||CHR(10)||CHR(13), '      ')userconstname,
refclassisn1,refclassisn2,refclassisn3
from inslab.dicti
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getCity($updated){
        return "select 
ISN, PARENTISN,
translate(SOCR,'\|/-'||CHR(10)||CHR(13), '      ')SOCR,
translate(NAME,'\|/-'||CHR(10)||CHR(13), '      ')NAME,
ACTIVE,COUNTRYISN,REGIONISN,
translate(POSTCODE,'\|/-'||CHR(10)||CHR(13), '      ')POSTCODE,
translate(GNICODE,'\|/-'||CHR(10)||CHR(13), '      ')GNICODE,
translate(OCATD,'\|/-'||CHR(10)||CHR(13), '      ')OCATD,
translate(GNINMB,'\|/-'||CHR(10)||CHR(13), '      ')GNINMB,
POPULATION,UPDATED,UPDATEDBY,
KT1,KT2,KT1_2009,KT2_2009,KT1_2011,KT2_2011,KT1_2012,KT2_2012,KT1_2015_4,KT2_2015_4,
translate(THEME,'\|/-'||CHR(10)||CHR(13), '      ')FIASCODE
from inslab.city
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getTariff($updated){
        return "select ISN, TARIFFISN, TARIFF, CURRISN, X1, X2, X3, X4, X5,
DATEBEG, DATEEND, 
translate(REMARK, '\|/-'||CHR(10)||CHR(13), '      ')REMARK, 
UPDATED, UPDATEDBY,X6,X7,X8,X9,X10,X11,X12,X13,X14,
X15,X16,X17,X18,X19,X20,X21,X22,X23,X24,X25,X26,X27,
X28,X29,X30,S1,S2,S3,S4,S5,S6,S7,S8,S9,S10,S11,S12,
S13,S14,S15,S16,S17,S18,S19,S20,S21,S22,S23,S24,S25,
S26,S27,S28,S29,S30
from inslab.tariff
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAddattr($updated){
        return "select 
isn,classisn, objisn, attrisn, 
TRANSLATE(orderno,CHR(10)||CHR(13)||'/|\-' ,'      ')orderno,
vald,valn,
TRANSLATE(valc,CHR(10)||CHR(13)||'/|\-' ,'      ')valc,
updated,updatedby,
TRANSLATE(remark,CHR(10)||CHR(13)||'/|\-' ,'      ')remark
from inslab.addattr
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAgreement($updated){
        return "select isn,deptisn,emplisn,clientisn,classisn,productisn,
translate(id,'\|/-'||CHR(10)||CHR(13), '      ')id,
translate(name,'\|/-'||CHR(10)||CHR(13), '      ')name,
status,
translate(code,'\|/-'||CHR(10)||CHR(13), '      ')code,
datesign,datebeg,dateend,datedenounce,previsn,addendumisn,
parentisn,currisn,currate,formisn,datebase,sectclassisn,
refsubjisn,
translate(refagrid,'\|/-'||CHR(10)||CHR(13), '      ')refagrid,
translate(remark,'\|/-'||CHR(10)||CHR(13), '      ')remark,
fid,created,createdby,updated,updatedby,
translate(id1c,'\|/-'||CHR(10)||CHR(13), '      ')id1c,
notrenewcauseisn,timebeg,stageisn,generaldocisn,crossisn,
reasoncancelisn,reasonaddendumisn,systemisn,dateliability,
addendumdatesign,addendumdatebeg,
translate(extsystemkey,'\|/-'||CHR(10)||CHR(13), '      ')extsystemkey,
frontnodeisn,epolicy,currsumisn,dateliabilityend,datecoolingend
from inslab.agreement
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')

";
    }

    public function getAgrobjagr($updated){
        return "select 
isn, classisn, insclassisn, 
TRANSLATE(id,CHR(10)||CHR(13)||'/|\-' ,'      ')id,
subjisn, currisn,currsumisn,datesign,datebeg,
dateend, datedenounce, 
TRANSLATE(remark,CHR(10)||CHR(13)||'/|\-' ,'      ')remark,
limitsum,tariff,premiumsum,comissionproc,comissionsum,
TRANSLATE(objremark,CHR(10)||CHR(13)||'/|\-' ,'      ')objremark,
updated,updatedby
from inslab.agrobjagr
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAgrobjcar($updated){
        return "select ISN,MODELISN,
translate(MODIFICATION,'\|/-'||CHR(10)||CHR(13), '      ')MODIFICATION,
RELEASEDATE,
translate(PTSSER,'\|/-'||CHR(10)||CHR(13), '      ')PTSSER,
translate(PTSNO,'\|/-'||CHR(10)||CHR(13), '      ')PTSNO,
PTSDATE,
translate(DOCSER,'\|/-'||CHR(10)||CHR(13), '      ')DOCSER,
translate(DOCNO,'\|/-'||CHR(10)||CHR(13), '      ')DOCNO,
DOCDATE,
translate(VIN,'\|/-'||CHR(10)||CHR(13), '      ')VIN,
translate(REGNO,'\|/-'||CHR(10)||CHR(13), '      ')REGNO,
translate(BODYID,'\|/-'||CHR(10)||CHR(13), '      ')BODYID,
translate(ENGINEID,'\|/-'||CHR(10)||CHR(13), '      ')ENGINEID,
translate(CHASSISID,'\|/-'||CHR(10)||CHR(13), '      ')CHASSISID,
POWER,VOLUME,NUMSEATS,TONNAGE,MAXMASS,NUMKEY,OWNERISN,
OWNERSHIPISN,COUNTRYISN,COLORISN,CARUSEISN,BONUSMALUSISN,
MULTIDRIVE,SURVEYNO,SURVEYDATE,EXPERTISN,REFISN,PERIODBEG,
PERIODEND,PERIODBEG1,PERIODEND1,REMARK,UPDATED,UPDATEDBY,
FOREIGN,CATEGORYISN,TERRITORYISN,PERIODBEG2,PERIODEND2,
PERIODBEG3,PERIODEND3,PTSCLASSISN,RIGHTWHEEL,DATEBEG,
ALARMONBOARD,ALARMISN1,ALARMISN2,ALARMISN3,PROBEG,REALPRICE,
translate(EXTSYSTEMKEY,'\|/-'||CHR(10)||CHR(13), '      ')EXTSYSTEMKEY,
translate(OSMOTRTALONSER,'\|/-'||CHR(10)||CHR(13), '      ')OSMOTRTALONSER,
translate(OSMOTRTALONNO,'\|/-'||CHR(10)||CHR(13), '      ')OSMOTRTALONNO,
OSMOTRSUBJISN,OSMOTRDATE,OSMOTRNEXTDATE,OSMOTRCLASSISN,
PASSENGER,MODIFICATIONISN,MARKETPRICE,USETRAILER,USESPECIALSIGNAL
from inslab.agrobjcar
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAgrobject($updated){
        return "Select a.isn,a.agrisn,a.classisn,a.subclassisn,
  translate(a.orderno,'\|/-'||CHR(10)||CHR(13), '      ')orderno,
        translate(a.objname,'\|/-'||CHR(10)||CHR(13), '      ') objname,
        a.objcount,a.parentisn,a.subjisn,a.sex,a.birthday,
        translate(a.remark,'\|/-'||CHR(10)||CHR(13), '      '),
  a.fid,a.updated,a.updatedby,a.resident,
  translate(a.LATITUDE,'\|/-'||CHR(10)||CHR(13),'      ')LATITUDE,
  translate(a.LONGITUDE,'\|/-'||CHR(10)||CHR(13),'      ')LONGITUDE,
  a.previsn,a.addendumisn,a.extsystemkey
from inslab.AGROBJECT a
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAgrrefund($updated){
        return "select ISN,DEPTISN,EMPLISN,CLAIMISN,AGRISN,
CONDISN,
translate(REMARK,'\|/-'||CHR(10)||CHR(13), '      ')ORDERNO,
DATEREG,
translate(ID,'\|/-'||CHR(10)||CHR(13), '      ')ID,
STATUS,CLASSISN,CLASSISN2,BENEFICIARYISN,RECIPIENTISN,
CLAIMSUM,FRANCHSUM,REFUNDSUM,REJECTSUM,CLAIMSUMAGR,
FRANCHSUMAGR,REFUNDSUMAGR,REJECTSUMAGR,
translate(SURVEYNO,'\|/-'||CHR(10)||CHR(13), '      ')SURVEYNO,
SURVEYDATE,EXPERTISN,ALLDOCDATE,
translate(DOCNO,'\|/-'||CHR(10)||CHR(13), '      ')DOCNO,
DOCDATE,PAYFORMISN,REJECTISN,OFFENDERISN,RESPONDISN,
REGRESSISN,REGRESSUM,
translate(REMARK,'\|/-'||CHR(10)||CHR(13), '      ')REMARK,
PERIODALL,PERIODNOTUSED,PREMPLAN,PREMFACT,PREMNOTUSED,
REFUNDPLAN,RVDPROC,RVDSUM,FID,
translate(ID1C,'\|/-'||CHR(10)||CHR(13), '      ')ID1C,
UPDATED,UPDATEDBY,PAYFORMCLASSISN,SIGNERISN,DOCMAKEDATE,
PREMPLANAGR,PREMFACTAGR,PREMNOTUSEDAGR,REFUNDPLANAGR,
RVDSUMAGR,SIGNERISN1,SIGNERISN2,SIGNERISN3,FRANCHPAYCOMPANY,
DATESOLUTION,INSUREDSEGMENTISN,STAGEISN,TOTALREFUNDSUM,
TOTALREFUNDSUMAGR,CREATED,CREATEDBY,ISDIRECTOSAGO,ISSTOPPED,
CAUSEISN,OBJISN,CURRISN,
translate(EXTSYSTEMKEY,'\|/-'||CHR(10)||CHR(13), '      ')EXTSYSTEMKEY,
RECIPIENTACCISN,REPARATIONFORMISN,AHDAGRISN
from inslab.agrrefund
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAgrrole($updated){
        return "select ISN,AGRISN,
translate(ORDERNO,'\|/-'||CHR(10)||CHR(13),'      ')ORDERNO,
CLASSISN,SUBJISN,DATEBEG,DATEEND,SHAREPROC,AMOUNT,
translate(REMARK,'\|/-'||CHR(10)||CHR(13),'      ')REMARK,
UPDATED,UPDATEDBY,BONUSMALUSISN,REFDOCISN
from inslab.agrrole
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
";
    }

    public function getAgrsum($updated){
        return "select ISN,CLASSISN,CLASSISN2,AGRISN,CONDISN,
CLAIMISN,REFUNDISN,AGRXISN,CLAIMXISN,SUBJISN,
PARENTISN,DISCR,ACC,DATEPAY,AMOUNT,AGRCURRISN,
AMOUNTAGR,DATECROSS,DOCISN,REFDOCISN,SHAREPROC,
translate(REMARK,'\|/-'||CHR(10)||CHR(13), '      ')REMARK,
FID,UPDATED,UPDATEDBY,OLDAGRISN,OLDCONDISN,
REGRESSISN,SALVAGEISN,OPERDOCISN,AHDAGRISN,
PAYCURRISN,AMOUNTPAY,RECURRISN,AMOUNTRE
from inslab.agrsum
where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')
and classisn2 in (2500,     --Возврат премии
                    3434,     --Возврат премии (вх. Re)
                    220232,   --Возмещение за ПВУ
                    223251,   --Вознаграждение брокера (исх. Re)
                    221752,   --Выплата по ущербу
                    3433,     --Доля в выплате возмещения (вх. Re)
                    3397,     --Доля в выплате возмещения (исх. Re)
                    3398,     --Доля в расходах по урегулированию (исх. Re)
                    2491,     --Комиссионное вознаграждение
                    3401,     --Комиссия (исх. Re)
                    3438,     --Премия (вх. Re)
                    3439,     --Премия (вх. Re) сторно
                    3403,     --Премия (исх. Re)
                    3404,     --Премия (исх. Re) сторно
                    3446,     --Прочие расходы (вх. Re)
                    221098,   --Прочие расходы по сопровождению
                    221012,   --Прочие расходы по урегулированию
                    2502,     --Регресс/Суброгация
                    2481     --Страховая премия
                   )
";
    }

    public function getSubaddr($updated){
        return "select 
ISN,SUBJISN,CLASSISN,COUNTRYISN,
translate(POSTCODE,'\|/-'||CHR(10)||CHR(13),'      ')POSTCODE,
translate(DISTRICT,'\|/-'||CHR(10)||CHR(13),'      ')DISTRICT,
CITYISN,STREETISN,
translate(STREET,'\|/-'||CHR(10)||CHR(13),'      ')STREET,
translate(HOUSE,'\|/-'||CHR(10)||CHR(13),'      ')HOUSE,
translate(BUILDING,'\|/-'||CHR(10)||CHR(13),'      ')BUILDING,
translate(FLAT,'\|/-'||CHR(10)||CHR(13),'      ')FLAT,
translate(ADDRESS,'\|/-'||CHR(10)||CHR(13),'      ')ADDRESS,
translate(ADDRESSLAT,'\|/-'||CHR(10)||CHR(13),'      ')ADDRESSLAT,
UPDATED,UPDATEDBY,
translate(LATITUDE,'\|/-'||CHR(10)||CHR(13),'      ')LATITUDE,
translate(LONGITUDE,'\|/-'||CHR(10)||CHR(13),'      ')LONGITUDE
from inslab.subaddr
        where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getSubdoc($updated){
        return "select isn, subjisn, classisn,
translate(docser,'\|/-'||CHR(10)||CHR(13), '      ')docser,
translate(docno,'\|/-'||CHR(10)||CHR(13), '      ')docno,
docdate,
translate(handby,'\|/-'||CHR(10)||CHR(13), '      ')handby,
dateend,
translate(remark,'\|/-'||CHR(10)||CHR(13), '      ')remark,
updated,updatedby
from inslab.subdoc
        where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getSubhuman($updated){
        return "
        select isn,sex,birthday,drivingdatebeg,docclassisn,
translate(docser,'\|/-'||CHR(10)||CHR(13), '      ')docser,
translate(docno,'\|/-'||CHR(10)||CHR(13), '      ')docno,
docdate,
translate(docissuedby,'\|/-'||CHR(10)||CHR(13), '      ')docissuedby,
translate(ssn,'\|/-'||CHR(10)||CHR(13), '      ')ssn,
translate(tabno,'\|/-'||CHR(10)||CHR(13), '      ')tabno,
deptisn,dutyisn,
translate(room,'\|/-'||CHR(10)||CHR(13), '      ')room,
familystateisn,educationisn,professionisn,n_kids,
translate(orgname,'\|/-'||CHR(10)||CHR(13), '      ')orgname,
translate(posname,'\|/-'||CHR(10)||CHR(13), '      ')posname,
translate(remark,'\|/-'||CHR(10)||CHR(13), '      ')remark,
updated,updatedby,docdateend,docdivisioncode,
translate(birthplace,'\|/-'||CHR(10)||CHR(13), '      ')birthplace
from inslab.subhuman
        where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getSubject($updated){
        return "Select s.isn,s.deptisn,s.emplisn,
       translate(s.shortname,'\|/-'||CHR(10)||CHR(13), '      ') shortname,
       translate(s.fullname,'\|/-'||CHR(10)||CHR(13), '      ') fullname,
       translate(s.namelat,'\|/-'||CHR(10)||CHR(13), '      ') namelat,
       s.classisn,s.active,s.juridical,s.resident,s.vip,s.countryisn,s.parentisn,s.inn,s.okvd,s.kpp,s.code,s.orgformisn,s.economicisn,s.subacc,
       translate(s.remark,'\|/-'||CHR(10)||CHR(13), '      ') remark,
       s.fid,s.updated,s.updatedby,s.id1c,s.created,s.createdby,s.synisn,s.syndate,s.synby,s.actual,s.enablesms,s.enablemail,s.iin,
       translate(s.firstname,'\|/-'||CHR(10)||CHR(13), '      ') firstname,
       translate(s.lastname,'\|/-'||CHR(10)||CHR(13), '      ') lastname,
       translate(s.parentname,'\|/-'||CHR(10)||CHR(13), '      ') parentname,
       s.extsystemkey,s.ogrn,s.systemisn,s.frontnodeisn,s.okpo,s.okvdisn,s.dateend,s.verified
from inslab.SUBJECT s
        where s.updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getSubphone($updated){
        return "
        select isn, subjisn, classisn,
translate(phone,'\|/-'||CHR(10)||CHR(13), '      ')phone,
translate(contact,'\|/-'||CHR(10)||CHR(13), '      ')contact,
refsubjisn,
translate(remark,'\|/-'||CHR(10)||CHR(13), '      ')remark,
updated,updatedby
from inslab.subphone
        where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }

    public function getWebuser($updated){
        return "
        select 
isn, created, createdby, updated, updatedby,webuserregisn,
phone,login,email,password,errorpwdcount,closedate,esiaid
from inslab.webuser
        where updated > to_date('$updated', 'DD.MM.YYYY HH24:MI:SS')";
    }



    public function temp($data, $type){
        $filename = $type."_data_export_" . date("Y-m-d") . ".csv";
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");

        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys((array)$data[0]), ';');
        foreach ($data as $row) {
            fputcsv($df, $this->getRow($row),';');
        }
        fclose($df);
        die();
    }

    public function getRow($row){
        $data = [];
        foreach ($row as $r){
            array_push($data, $r);
        }
        return $data;
    }
}
