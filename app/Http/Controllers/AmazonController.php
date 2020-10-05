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
        $query = $this->{"get$table"}($request->updated);
        $result = DB::connection('oracle')->select($query);
        $end = time();
        $this->temp($result, 'client');
    }

    public function getAgrclause($updated){
        $updated = date('d.m.Y H:i:s', strtotime($updated));
        return "Select 
        isn, agrisn, orderno, clauseisn, classisn, 
        TRANSLATE(remark,CHR(10)||CHR(13)||'/|\-' ,'      ') remark,
        updated, updatedby
        from inslab.AgrClause
        where updated > to_date('$updated','dd.mm.YYYY HH24:MI:SS')";
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
