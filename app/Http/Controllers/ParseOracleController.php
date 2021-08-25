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

    /*public function dateTypes(){
        return [
            'year',
            'month',
            'days',
        ];
    }*/

    public function getOracleCollect(Request $request){



            //фильтр даты
/*            if($request->first_period < '10'){
                $first_date = $request->days.'-'.'0'.$request->first_period.'-'.$request->first_year;
            }else {
                $first_date = $request->days.'-'.$request->first_period.'-'.$request->first_year;
            }
            $firstDate = date('d-M-y',strtotime($first_date));
            if($request->second_period < '10'){
                $second_date = $request->days.'-'.'0'.$request->second_period.'-'.$request->second_year;
            }else {
                $second_date = $request->days.'-'.$request->second_period.'-'.$request->second_year;
            }
            $secondDate = date('d-M-y',strtotime($second_date));*/

            switch ($request){
                case $request->days == null:
                    //$first_date = '01'.'-'.'0'.$request->first_period.'-'.$request->first_year;
                    $firstDate = date('M-y',strtotime($first_date));
                    break;
                case $request->first_period < '10':
                    $first_date = $request->days.'-'.'0'.$request->first_period.'-'.$request->first_year;
                    break;

                case $request->first_period > '10':
                    $first_date = $request->days.'-'.$request->first_period.'-'.$request->first_year;
                    break;
            }
            $firstDate = date('d-M-y',strtotime($first_date));
            dd($firstDate);






        $collects = ParseCollects::where('dateAccept', $firstDate)
            ->orderby('id', 'desc')
            ->get(['id','emplIsn','deptIsn','deptName', 'emplName','DSD','comissionProc'])
            ->toArray();

        $collects2 = ParseCollects::where('dateAccept', $secondDate)
            ->orderby('id', 'desc')
            ->get(['id','emplIsn','deptIsn','deptName', 'emplName','DSD','comissionProc'])
            ->toArray();


        $deptCollectFirst = [];
        $deptCollectSecond = [];
        foreach (self::$departmentNames as $departmentName) {
            $deptCollectFirst[$departmentName] = [];
            $deptCollectSecond[$departmentName] = [];
        }

        foreach ($collects as $collect) {
            $arrName = $this->getCollectDeptName($collect['deptIsn']);
            if (!$arrName)
                continue;
            //$deptCollectData[$arrName] = $collect;
            array_push($deptCollectFirst[$arrName], $collect);
        }

        foreach ($collects2 as $collect) {
            $arrName = $this->getCollectDeptName($collect['deptIsn']);
            if (!$arrName)
                continue;
            //$deptCollectData[$arrName] = $collect;
            array_push($deptCollectSecond[$arrName], $collect);
        }

//Общая сумма
/*            $key = 'DSD';
            $sum = array_sum(array_column($deptCollectData['aktobe'],$key));*/


        return response()->json([
            'success' => true,
            'data' => $deptCollectFirst,
            'data1' => $deptCollectSecond,

        ]);

    }
}
