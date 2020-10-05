<?php

namespace App\Http\Controllers;

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
        //ini_set('xdebug.max_nesting_level', 10000);
        $mainProducts = [
            self::DICTI_DOBR_ISN => "ДОБРОВОЛЬНОЕ СТРАХОВАНИЕ",
            self::DICTI_OBZ_ISN => "ОБЯЗАТЕЛЬНОЕ СТРАХОВАНИЕ",
            self::DICTI_VXOD_ISN => "ВХОДЯЩЕЕ ПЕРЕСТРАХОВАНИЕ"
        ];
        $result = [];
        foreach ($mainProducts as $productIsn => $productLabel){
            array_push($result, [
                'id' => $productIsn,
                'label' => $productLabel,
                'children' => self::getProductChild($kias, $productIsn)
            ]);
        }
        return response()->json([
            'result' => $result
        ]);
//        dd($result);
        //return $result;
    }

    public static function getProductChild($kias, $product){
        $result = [];
        $data = $kias->getDictList($product, 0);
        foreach ($data->ROWSET->row as $row){
            if((int)$row->N_KIDS == 1){
                array_push($result, [
                    'id' => (string)$row->ISN,
                    'label' => (string)$row->FULLNAME,
                    'children' => self::getProductChild($kias, $row->ISN)
                ]);
            }else {
                array_push($result, [
                    'id' => (string)$row->ISN,
                    'label' => (string)$row->FULLNAME
                ]);
            }
        }
        return $result;
    }

    public function getReport(Request $request, KiasServiceInterface $kias){
        $ISN = $request->isn;
        /*
         * 1446265
         * 1446171
         * 1446285
         */
        $dateBeg = date('d.m.Y', strtotime($request->dateBeg));
        $dateEnd = date('d.m.Y', strtotime($request->dateEnd));
        $response = $kias->GetInfoUser($dateBeg, $dateEnd, $ISN);
        dd($response);
        if($response->error) {
            return response()
                ->json([
                    'success' => false,
                    'error' => $response->error->text,
                ]);
        }
        return response()
            ->json([
                'success' => true,
                'info' => $response
            ]);
    }

    public function getProdData(Request $request, KiasServiceInterface $kias){
        $result = $kias->request('GETDICTILIST', [
           'DictiISN' => self::DICTI_OBZ_ISN,
           'Mode' => 0
        ]);
        //dd($result);
    }

    public function testiruem(KiasServiceInterface $kias){
        ini_set('xdebug.max_nesting_level', 10000);
        $mainProducts = [
            self::DICTI_DOBR_ISN => "ДОБРОВОЛЬНОЕ СТРАХОВАНИЕ",
            self::DICTI_OBZ_ISN => "ОБЯЗАТЕЛЬНОЕ СТРАХОВАНИЕ",
            self::DICTI_VXOD_ISN => "ВХОДЯЩЕЕ ПЕРЕСТРАХОВАНИЕ"
        ];
        $result = [];
        foreach ($mainProducts as $productIsn => $productLabel){
            array_push($result, [
                'id' => $productIsn,
                'label' => $productLabel,
                'children' => self::getProductChild($kias, $productIsn)
            ]);
        }
//        return response()->json([
//            'result' => $result
//        ]);
        return response()
            ->json([
                'success' => true,
                'result' => $result
            ]);
    }
}
