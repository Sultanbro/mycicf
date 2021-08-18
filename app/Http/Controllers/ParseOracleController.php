<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParseOracleController extends Controller
{
    public function getOracleCollect(){

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

/*        foreach ($pays as $item){
            array_push($result, $item->deptName);
        }

        $department = array_unique($result);
        dd($department);*/

        foreach ($collect as $item){
            if($item->deptName === 'Филиал по Карагандинской области'){
                array_push($karaganda, [
                    'key' => $item->id,
                    'isn' => $item->emplISN,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }

        foreach ($collect as $item){
            if($item->deptName === 'Филиал по г.Нур-Султан'){
                array_push($nur_sultan, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                    ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по г. Актобе'){
                array_push($aktobe, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по Восточно-Казахстанской области'){
                array_push($vko, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по г.Шымкент'){
                array_push($shym, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по Северо-Казахстанской области'){
                array_push($sko, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по Павлодарской области'){
                array_push($pavlo, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по Жамбылской области'){
                array_push($jambyl, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
            }
        }
        foreach ($collect as $item){
            if($item->deptName === 'Филиал по г.Кокшетау'){
                array_push($koksh, [
                    'key' => $item->id,
                    'name' => $item->emplName,
                    'DSD' => $item->DSD,
                    'comissionProc'=> $item->comissionProc,
                ]);
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
