<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParseOracleController extends Controller
{
    static $departmentNames = [
        //ДКС
        1445780 => 'dks',
        1445781 => 'uks1',
        1445783 => 'uks2',
        1445784 => 'uks3',
        4989735 => 'uks4',
        4784106 => 'ukr',
        //ДСП
        3436143 => 'dsp',
        1445824 => 'almaty',
        4559142 => 'uap',
        1445789 => 'us1',
        1445790 => 'us2',
        1445791 => 'us3',
        1445792 => 'us4',
        1445793 => 'us5',
        3492324 => 'us6',
        3492327 => 'us7',
        //ДРПО
        3629955 => 'drpo',
        3991836 => 'upp',
        //ДП
        1445737 => 'dp',
        //Филиалы
        1445735 => 'nur_sultan',
        1445823 => 'aktobe',
        1445828 => 'shym',
        1445805 => 'koksh',
        1445822 => 'semei',
        1445799 => 'atyrau_obl',
        1445798 => 'aktobe_obl',
        1445801 => 'kar_obl',
        1445814 => 'kos_obl',
        1445818 => 'kyz_obl',
        1445797 => 'mang_obl',
        1445820 => 'pavlo_obl',
        1445825 => 'jambyl_obl',
        1445821 => 'sko',
        1445827=> 'vko',

        //Сайт
        3991842 => 'kupipolis',
    ];

    public function getCollectDeptName($deptIsn)
    {
        return array_key_exists($deptIsn, self::$departmentNames) ? self::$departmentNames[$deptIsn] : false;
    }

    public function getOracleCollect(Request $request){

        $first_date = $request->first_year.'-'.'0'.$request->first_period;
        $firstDate = date('d-M-y',strtotime($first_date));
        $second_date = $request->second_year.'-'.'0'.$request->second_period;
        $secondDate = date('d-M-y',strtotime($second_date));

        $collects = ParseCollects::where('dateAccept', $firstDate)
            ->orderby('id', 'desc')
            ->get(['id','emplIsn','deptIsn','deptName', 'emplName','DSD','comissionProc'])
            ->toArray();

        $deptCollectData = [];
        foreach (self::$departmentNames as $departmentName) {
            $deptCollectData[$departmentName] = [];
        }

        foreach ($collects as $collect) {
            $arrName = $this->getCollectDeptName($collect['deptIsn']);
            if (!$arrName)
                continue;
            //$deptCollectData[$arrName] = $collect;
            array_push($deptCollectData[$arrName], $collect);
        }

        return response()->json([
            'success' => true,
            'data' => $deptCollectData,
        ]);

    }
}
