<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\ExpressProduct;
use App\FullProduct;
use App\FullQuotation;
use App\FullConstructor;
use App\InsProduct;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function getVehicle(Request $request){
        $success = false;
        $error = '';
        $kias = new Kias();
        $kias->initSystem();
        $vin = $request->VIN ?? null;
        $tfNumber = $request->REGNO ?? null;
        $result = $kias->getVehicle($vin, null, $tfNumber, null);

//        if (isset($result->error)) {
//            return response()->json([
//                'success' => false,
//                'error' => (string)$result->error->text
//            ]);
//        }

        if(!isset($result->VIN)){
            $result = $kias->getVehicle($vin, null, $tfNumber, null,1);
        }

        if (isset($result->error)) {
            return response()->json([
                'success' => false,
                'error' => (string)$result->error->text
            ]);
        }

        if(isset($result->VIN)){
            $releaseDate = isset($result->REALESE_DATE) ? '01.12.'.(string)$result->REALESE_DATE : (string)$result->DATERELEASE;
            $territory_isn = isset($result->REG_TERRITORY) ? (string)$result->REG_TERRITORY : 17;
            $territory_name = isset($result->REG_TERRITORY_NAME) ? (string)$result->REG_TERRITORY_NAME : 'Временный въезд';

            $modelISN = (string)$result->MODELISN != null ? (string)$result->MODELISN : (string)$result->MODEL_ID;
            $markISN = (string)$result->MARKISN != null ? (string)$result->MARKISN : (string)$result->VOITUREMARKID;
            $model = (string)$result->MODELNAME != null ? (string)$result->MODELNAME : (string)$result->VOITUREMODEL;
            $mark = (string)$result->MARKNAME != null ? (string)$result->MARKNAME : (string)$result->VOITUREMARK;

            $success = true;
            $result = array(
                'ModelISN' => $modelISN,
                'Model' => $model,
                'MarkaISN' => $markISN,
                'Mark' => $mark,
                'ClassISN' => $request->ClassISN,
                'ReleaseDate' => $releaseDate,
                'VIN' => (string)$result->VIN,
                'REGNO' => $request->REGNO, //(string)$result->REG_NUM,
                'OwnerJuridical' => 'N',
                'TerritoryISN' => $territory_isn,
                'TerritoryName' => $territory_name,
                'PROBEG' => '',
                'REALPRICE' => ''
            );
        } else {
            $error = 'not_found';
        }
        return response()->json([
            'success' => $success,
            'error' => $error,
            'result' => $result
        ]);
    }

    public function saveVehicle(Request $request){
        $kias = new Kias();
        $kias->initSystem();

        $vin = $request->data['VIN'] ?? null;
        $tfNumber = $request->data['PLATE'] ?? null;
        $error = null;
        $result = null;

        $checkByVin = $kias->getVehicle($vin, null, null, null);    // Сначало проверяем по VIN номеру
        if(!isset($checkByVin->VIN)){
            $checkByVin = $kias->getVehicle($vin, null, null, null,1);
            if(!isset($checkByVin->VIN)){
                $checkByNumber = $kias->getVehicle(null, null, $tfNumber, null);    // Потом проверяем по гос номеру
                if(!isset($checkByNumber->VIN)){
                    $checkByNumber = $kias->getVehicle(null, null, $tfNumber, null,1);
                    if(isset($checkByNumber->VIN)){
                        $error = 'В базе данных уже есть автотранспорт с таким гос номером - '.$tfNumber;
                    }
                } else {
                    $error = 'В базе данных уже есть автотранспорт с таким гос номером - '.$tfNumber;
                }
            } else {
                $error = 'В базе данных уже есть автотранспорт с таким VIN номером - '.$vin;
            }
        } else {
            $error = 'В базе данных уже есть автотранспорт с таким VIN номером - '.$vin;
        }

        if($error != null){
            return response()->json([
                'success' => false,
                'error' => $error
            ]);
        }

        try {
            $saveVehicle = $kias->saveVehicle($request->data);
            if(isset($saveVehicle->error)){
                $success = false;
                $error = (string)$saveVehicle->error->fulltext;
            } else {
                $success = true;
                $result = $request->data;
            }
        } catch (KiasRequestException $e) {
            $success = false;
            $error = $e->getMessage();
        }

        return response()->json([
            'success' => $success,
            'error' => $error,
            'result' => $result
        ]);
    }
}
