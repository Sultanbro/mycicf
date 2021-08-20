<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Illuminate\Http\Request;

class ParseOracleController extends Controller
{
    public function getOracleCollect(Request $request){
        //dd($request);
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
         * Департамент перестрахования  1445737
         * Филиалы  2000
         * kupipolis
         *
         * */

        $collect = ParseCollects::all();
        $pays = ParsePays::all();
        $karaganda = [];
        $nur_sultan = [];
        $aktobe = [];
        $vko = [];
        $shym = [];
        $sko = [];
        $pavlo = [];
        $jambyl = [];
        $koksh = [];

        //$result = date('Y-m',strtotime("01-JAN-19"));

        $first_date = $request->first_year.'-'.'0'.$request->first_period;
        $second_date = $request->second_year.'-'.'0'.$request->second_period;


        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445801' && $elem->deptIsn === '1445801'
                    && $item->emplISN === $elem->emplIsn
                && date('Y-m',strtotime($item->dateAccept) === $first_date)
                && date('Y-m',strtotime($item->dateAccept) === $second_date)
                && date('Y-m',strtotime($elem->docDate) === $first_date)
                && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($karaganda, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445735' && $elem->deptIsn === '1445735'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($nur_sultan, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445823' && $elem->deptIsn === '1445823'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($aktobe, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445827' && $elem->deptIsn === '1445827'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($vko, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445828' && $elem->deptIsn === '1445828'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($shym, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445821' && $elem->deptIsn === '1445821'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($sko, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445820' && $elem->deptIsn === '1445820'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($pavlo, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445825' && $elem->deptIsn === '1445825'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($jambyl, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }
        foreach ($collect as $item){
            foreach ($pays as $elem){
                if($item->deptIsn === '1445805' && $elem->deptIsn === '1445805'
                    && $item->emplISN === $elem->emplIsn
                    && date('Y-m',strtotime($item->dateAccept) === $first_date)
                    && date('Y-m',strtotime($item->dateAccept) === $second_date)
                    && date('Y-m',strtotime($elem->docDate) === $first_date)
                    && date('Y-m',strtotime($elem->docDate) === $second_date)){
                    array_push($koksh, [
                        'key' => $item->id,
                        'isn' => $item->emplISN,
                        'name' => $item->emplName,
                        'DSD' => $item->DSD,
                        'comissionProc'=> $item->comissionProc,
                        'totalRefundSum' => $elem->totalRefundSum,
                        'nettoRefundSum' => $elem->nettoRefundSum,
                    ]);
                }
            }
        }

        $filials = [];
        $aaa = [];
        array_push($aaa,[
            'key'=> 111,
            'name'=> 'Караганда',
            'DSD'=> 20,
            'comissionProc'=> 'sum',
            'nettoRefundSum'=> 'sum',
            'totalRefundSum'=> 'sum',
            'children' => $karaganda
        ],
        [
            'key'=> 121,
            'name'=> 'Нур-Султан',
            'DSD'=> 20,
            'comissionProc'=> 'sum',
            'nettoRefundSum'=> 'sum',
            'totalRefundSum'=> 'sum',
            'children' => $nur_sultan
        ],
            [
                'key'=> 131,
                'name'=> 'Актобе',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $aktobe
            ],
            [
                'key'=> 141,
                'name'=> 'ВКО',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $vko
            ],
            [
                'key'=> 151,
                'name'=> 'Шымкент',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $shym
            ],
            [
                'key'=> 161,
                'name'=> 'СКО',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $sko
            ],
            [
                'key'=> 171,
                'name'=> 'Павлодар',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $pavlo
            ],
            [
                'key'=> 181,
                'name'=> 'Жамбыл',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $jambyl
            ],
            [
                'key'=> 191,
                'name'=> 'Кокшетау',
                'DSD'=> 20,
                'comissionProc'=> 'sum',
                'nettoRefundSum'=> 'sum',
                'totalRefundSum'=> 'sum',
                'children' => $koksh
            ]
        );


        array_push($filials,[
            'key'=> 11,
            'name'=> 'Филилалы',
            'DSD'=> 20,
            'comissionProc'=> 'sum',
            'nettoRefundSum'=> 'sum',
            'totalRefundSum'=> 'sum',
            'children'=> $aaa
        ]);



        return response()->json([
            'success' => true,
            'data' => $filials,
        ]);
    }
}
