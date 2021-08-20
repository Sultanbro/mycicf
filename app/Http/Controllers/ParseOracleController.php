<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParseOracleController extends Controller
{

    public function getCollectDeptName($deptIsn)
    {
        $departmentNames = [
            //ДКС
            1445781 => 'uks1',
            1445783 => 'uks2',
            1445784 => 'uks3',
            4989735 => 'uks4',
            4784106 => 'ukr',
            //Филиалы
            1445801 => 'karaganda',
            1445735 => 'nur_sultan',
            1445823 => 'aktobe',
            1445827=> 'vko',
            1445828 => 'shym',
            1445821 => 'sko',
            1445820 => 'pavlo',
            1445825 => 'jambyl',
            1445805 => 'koksh',
            //Сайт
            3991842 => 'kupipolis',
        ];
        return array_key_exists($deptIsn, $departmentNames) ? $departmentNames[$deptIsn] : false;
    }


    public function getOracleCollect(Request $request){
        /*
         * Департамент корпоративного страхования   1445780
         * Управление корпоративного развития       4784106
         * Управление корпоративного страхования №1 1445781
         * Управление корпоративного страхования №2 1445783
         * Управление корпоративного страхования №3 1445784
         * Управление корпоративного страхования №4 4989735
         * Управление корпоративного страхования №5 4989736
         *
         * Департамент страхового посредничества   3436143
         * г.Алматы 1445824
         * Управление активных продаж   4559142
         * Управление страхования №1    1445789
         * Управление страхования №2    1445790
         * Управление страхования №3    1445791
         * Управление страхования №4    1445792
         * Управление страхования №5    1445793
         * Управление страхования №6    3492324
         * Управление страхования №7    3492327
         *
         *
         * Департамент развития партнерских отношений   3629955
         * Управление партнерских продаж    3991836
         *
         *
         *
         * Департамент перестрахования  1445737
         * Филиалы  2000
         * kupipolis
         *Управление электронных продаж 3991842
         * */
        //$result = date('Y-m',strtotime("01-JAN-19"));
        //$result = date('d-M-y',strtotime("2019-01-01"));


        $first_date = $request->first_year.'-'.'0'.$request->first_period;
        $firstDate = date('d-M-y',strtotime($first_date));
        $second_date = $request->second_year.'-'.'0'.$request->second_period;

        $collects = ParseCollects::where('dateAccept', $firstDate)
            ->orderby('id', 'desc')
            ->get(['id','emplIsn','deptIsn', 'emplName','DSD','comissionProc'])
            ->toArray();

        $deptCollectData = [];
        foreach ($collects as $collect) {
            $arrName = $this->getCollectDeptName($collect['deptIsn']);
            if (!$arrName)
                continue;
            if (!array_key_exists($arrName, $deptCollectData))
                $deptCollectData[$arrName] = [];
                $deptCollectData[$arrName] = $collect;
        }

        //dd($deptCollectData['kupipolis']);
        // 'totalRefundSum'
        // 'nettoRefundSum'

        $filials = [];
        $aaa = [];
        $dks = [];
        $polis = [];
        if(isset($deptCollectData[$arrName]))
            array_push(
                $dks,
                [
                    'key'=> 001,
                    'emplName'=> 'Управление страхования №1',
                    'DSD'=> 20,
                    'comissionProc'=> 'sum',
                    'nettoRefundSum'=> 'sum',
                    'totalRefundSum'=> 'sum',
                    'children' => $deptCollectData['uks1']
                ],
                [
                    'key'=> 002,
                    'emplName'=> 'Управление страхования №2',
                    'DSD'=> 20,
                    'comissionProc'=> 'sum',
                    'nettoRefundSum'=> 'sum',
                    'totalRefundSum'=> 'sum',
                    'children' => $deptCollectData['uks2']
                ],
                [
                    'key'=> 003,
                    'emplName'=> 'Управление страхования №3',
                    'DSD'=> 20,
                    'comissionProc'=> 'sum',
                    'nettoRefundSum'=> 'sum',
                    'totalRefundSum'=> 'sum',
                    'children' => $deptCollectData['uks3']
                ],
                [
                    'key'=> 004,
                    'emplName'=> 'Управление страхования №4',
                    'DSD'=> 20,
                    'comissionProc'=> 'sum',
                    'nettoRefundSum'=> 'sum',
                    'totalRefundSum'=> 'sum',
                    'children' => $deptCollectData['uks4']
                ],
                [
                    'key'=> 005,
                    'emplName'=> 'Управление страхования №5',
                    'DSD'=> 20,
                    'comissionProc'=> 'sum',
                    'nettoRefundSum'=> 'sum',
                    'totalRefundSum'=> 'sum',
                    'children' => $deptCollectData['uks5']
                ],
                [
                    'key'=> 005,
                    'emplName'=> 'Управление корпоративного развития',
                    'DSD'=> 20,
                    'comissionProc'=> 'sum',
                    'nettoRefundSum'=> 'sum',
                    'totalRefundSum'=> 'sum',
                    'children' => $deptCollectData['ukr']
                ]
            );
        if(isset($deptCollectData[$arrName]))
        array_push(
            $aaa,[
            'key'=> 111,
            'emplName'=> 'Караганда',
            'DSD'=> 20,
            'comissionProc'=> 'sum',
            'nettoRefundSum'=> 'sum',
            'totalRefundSum'=> 'sum',
            'children' => $deptCollectData['karaganda']
        ],
        [
            'key'=> 121,
            'emplName'=> 'Нур-Султан',
            'DSD'=> 20,
            'comissionProc'=> 'sum',
            'nettoRefundSum'=> 'sum',
            'totalRefundSum'=> 'sum',
            'children' => $deptCollectData['nur_sultan']
        ],
            [
                'key'=> 131,
                'emplName'=> 'Актобе',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['aktobe']
            ],
            [
                'key'=> 141,
                'emplName'=> 'ВКО',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['vko']
            ],
            [
                'key'=> 151,
                'emplName'=> 'Шымкент',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['shym']
            ],
            [
                'key'=> 161,
                'emplName'=> 'СКО',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['sko']
            ],
            [
                'key'=> 171,
                'emplName'=> 'Павлодар',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['pavlo']
            ],
            [
                'key'=> 181,
                'emplName'=> 'Жамбыл',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['jambyl']
            ],
            [
                'key'=> 191,
                'emplName'=> 'Кокшетау',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $deptCollectData['koksh']
            ]
        );

        array_push($polis,$deptCollectData['kupipolis']);

        array_push($filials,
            [
                'key'=> 302,
                'emplName'=> 'Департамент корпоративного страхования',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $dks
            ],
            [
            'key'=> 11,
            'emplName'=> 'Филилалы',
            'DSD'=> 20,
            'comissionProc'=> 'sum',
            'nettoRefundSum'=> 'sum',
            'totalRefundSum'=> 'sum',
            'children'=> $aaa
        ],
            [
                'key'=> 404,
                'emplName'=> 'kupipolis',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $polis
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $filials,
        ]);
    }
}
