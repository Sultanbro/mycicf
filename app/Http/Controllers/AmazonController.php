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
duration, currisn, currsumisn, limitsum, limitsumext,
translate(tariffstr, CHR(10)||CHR(13)||'/|\-', '      ') tariffstr,
premiumsum, franchtype, franchtariff, franchsum, COMISSIONPROC,
COMISSIONSUM,
translate(remark, CHR(10)||CHR(13)||'/|\-', '      ') remark,
fid, 
TO_CHAR(updated, 'YYYY-MM-DD') updated,
updatedby, parentisn, limitsumtype, paymentkoeff,
premiumsumtariff, 
TO_CHAR(created, 'YYYY-MM-DD') created, 
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
where updated > to_date('$updated', 'YYYY-MM-DD HH24:MI:SS')";
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
where updated > to_date('$updated', 'YYYY-MM-DD HH24:MI:SS')";
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
