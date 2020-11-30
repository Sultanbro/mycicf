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

    public function getReceivablesByClass()
    {
      $ReceivablesSQL = DB::table('report_receivables')->select(['productClassCode',  DB::raw('SUM(amountD) as value')])
                ->groupBy('productClassCode')
                ->orderBy('productClassCode', 'desc')
                ->get();


      return $ReceivablesSQL;
    }

    public function getReceivablesJur()
    {

      $ReceivablesSQL = DB::table('report_receivables')->select(DB::raw('SUM(amountD) as value'))
                ->where('jur', 'Y')
                ->get();


      return $ReceivablesSQL;
    }
}
