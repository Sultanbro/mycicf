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
TO_CHAR(UPDATED, 'YYYY-MM-DD') UPDATED,
UPDATEDBY,ACCIDENTMODEISN,
TO_CHAR(CREATED, 'YYYY-MM-DD') CREATED,
CREATEDBY,
TO_CHAR(TIMECLAIM, 'YYYY-MM-DD') TIMECLAIM,
SCHEMEISN,
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
