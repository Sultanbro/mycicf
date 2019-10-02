<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use App\Providers\KiasServiceProvider;
use Illuminate\Http\Request;

class CoordinationController extends Controller
{
    public function index(){
        return view('coordination');
    }

    public function getCoordinationList(Request $request, KiasServiceInterface $kias){
        $success = true;
        $error = null;
        $ISN = $request->isn;
        $response = $kias->myCoordinationList($ISN);
        if($response->error){
            $success = false;
            $error = (string)$response->text;
        }
        $AC = $SP = $SZ = $KV = $OL = $AD = $RV = $other = null;
        if($response->AC->row[0]->docdate != 0){
            $AC = array();
            foreach ($response->AC->row as $row) {
                array_push($AC, [
                    'ISN' => (integer)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->SP->row[0]->docdate != 0){
            $SP = array();
            foreach ($response->SP->row as $row) {
                array_push($SP, [
                    'ISN' => (string)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->SZ->row[0]->docdate != 0){
            $SZ = array();
            foreach ($response->SZ->row as $row) {
                array_push($SZ, [
                    'ISN' => (string)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->KV->row[0]->docdate != 0){
            $KV = array();
            foreach ($response->KV->row as $row) {
                array_push($KV, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->OL->row[0]->docdate != 0){
            $OL = array();
            foreach ($response->OL->row as $row){
                array_push($OL, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'DeptName' => (string)$row->DeptName,
                ]);
            }
        }

        if($response->AD->row[0]->period != 0){
            $AD = array();
            foreach ($response->AD->row as $row){
                array_push($AD, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'days' => (string)$row->cnt
                ]);
            }
        }

        if($response->RV->row[0]->docpaydate != 0){
            $RV = array();
            foreach ($response->RV->row as $row) {
                array_push($RV, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'PayDate' => (string)$row->docpaydate,
                ]);
            }
        }

        if($response->other->row[0]->docdate != 0){
            $other = array();
            foreach ($response->other->row as $row){
                array_push($other, [
                    'ISN' => (string)$row->ISN,
                    'type' => (string)$row->Type,
                    'curator' => (string)$row->curator,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'DeptName' => (string)$row->DeptName,
                ]);
            }
        }

        $result = [
            'success' => $success,
            'error' => $error,
            'result' => array(
                'AC' => $AC,
                'SP' => $SP,
                'SZ' => $SZ,
                'KV' => $KV,
                'OL' => $OL,
                'AD' => $AD,
                'RV' => $RV,
                'other' => $other
            )
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }
}
