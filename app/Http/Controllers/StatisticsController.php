<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * ISN Справочников в КИАСЕ
     */
    const DICTI_OBZ_ISN   = 437111;
    const DICTI_DOBR_ISN  = 437121;
    const DICTI_VXOD_ISN  = 482831;

    public function index(){
        return view('statistics');
    }

    public function getProducts(KiasServiceInterface $kias){
        $result = [];
        $headData = Dicti::whereIn('isn', [self::DICTI_OBZ_ISN, self::DICTI_DOBR_ISN, self::DICTI_VXOD_ISN])->get();
        foreach ($headData as $data){
            if(count($data->childs)){
                array_push($result, [
                    'id' => $data->isn,
                    'label' => $data->fullname,
                    'children' => $this->getChild($data->isn),
                ]);
            }else{
                array_push($result, [
                    'id' => $data->isn,
                    'label' => $data->fullname,
                ]);
            }
        }
        $res = [];
        array_push($res, [
            'id' => 13,
            'label' => 'Все продукты',
            'children' => $result
        ]);
        return response()->json([
            'result' => $res
        ]);
    }

    public function getChild($parent){
        $result = [];
        $headData = Dicti::where('parent_isn', $parent)->get();
        foreach ($headData as $data){
            if(count($data->childs)){
                array_push($result, [
                    'id' => $data->isn,
                    'label' => $data->fullname,
                    'children' => $this->getChild($data->isn),
                ]);
            }else{
                array_push($result, [
                    'id' => $data->isn,
                    'label' => $data->fullname,
                ]);
            }
        }
        return $result;
    }

    public function getProdData(Request $request, KiasServiceInterface $kias){
        $result = $kias->request('GETDICTILIST', [
            'DictiISN' => self::DICTI_OBZ_ISN,
            'Mode' => 0
        ]);
        //dd($result);
    }

//    public function getProdData(Request $request, KiasServiceInterface $kias){
//        $result = $kias->request('User_CicGetFullDictiList', [
//            'ISN' => 13
//        ]);
//        //dd($result);
//    }

    public function getReport(Request $request, KiasServiceInterface $kias){
        $product = $request->product;
        $emplIsn = $request->isn;
        $response = $kias->getUnderReport($product, $emplIsn, $request->dateBeg,$request->dateEnd);
        $pieQuantity = [[
            'Продукт', 'Доля'
        ]];
        $pieType = [[
            'Продукт', 'Доля'
        ]];
        foreach($response->CALC3->row as $row){
            array_push($pieQuantity, [
                (string)$row->dept." ".'- '.$row->quantity, (double)str_replace(',','.', (string)$row->quantity)
            ]);
        }
        foreach ($response->CALC1->row as $row){
            array_push($pieType, [
                (string)$row->product." ".'- '.(string)$row->ptype, (double)str_replace(',','.', (string)$row->ptype)
            ]);
        }
        $genData = [
            ['Тип', 'Заявки', 'Согласовано', 'Отказано', 'В работе', 'Договоры'],
            [
                'Кол-во',
                (int)$response->GEN->row->AllReq,
                (int)$response->GEN->row->done,
                (int)$response->GEN->row->rejected,
                (int)$response->GEN->row->onwork,
                (int)$response->GEN->row->agr,
            ]
        ];
        $calc = [
            ['Тип', 'Заявки', 'Согласовано', 'Отказано', 'В работе', 'Договоры'],
            [
                'Кол-во',
                (int)$response->CALC2->row->AllReq,
                (int)$response->CALC2->row->done,
                (int)$response->CALC2->row->rejected,
                (int)$response->CALC2->row->onwork,
                (int)$response->CALC2->row->agr,
            ]
        ];
//        foreach ($response->CALC2->row as $row){
//            array_push();
//        }
        return response()->json([
            'pieQuantity' => $pieQuantity,
            'pieType' => $pieType,
            'genData' => $genData,
            'calc' => $calc,
            'success' => true,
        ]);
    }
}
