<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BackendDashboardController extends Controller
{

    public function getReceivables()
    {

      $ReceivablesSQL = DB::table('report_receivables')->select('mainDeptName AS name',  DB::raw('SUM(amountD) as value'))
                ->groupBy('mainDeptName')
                ->orderBy('value', 'desc')
                ->get();


      return $ReceivablesSQL;
    }
}
