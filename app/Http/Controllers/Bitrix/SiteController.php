<?php

namespace App\Http\Controllers\Bitrix;

use App\Http\Controllers\Controller;
use App\Http\Middleware\BitrixAuthenticate;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;

class SiteController extends Controller
{
    public function authorization(Request $request, KiasServiceInterface $kias){
        $response = $kias->authenticate($request->username, hash('sha512', $request->password));
        if($response->error) {
            $success = false;
            $response = array(
                'success' => $success,
                'error' => (string)$response->error->text,
            );
        }
        if($response->UserDetails) {
            $ISN = $response->UserDetails->ISN;
            $sid = $response->Sid;
            $response = array(
                'success' => true,
                'data' => [
                    'isn' => (string)$ISN,
                    'auth_token' => (string)$sid,
                ]
            );
        }
        return response()->json($response)->withCallback($request->input('callback'));
    }

    public function renewal(Request $request, KiasServiceInterface $kias) {
        $kias->_sId = $request->Sid;
        $response = $kias->request('User_CicHelloSvc', []);
        if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text,
            ]);
        }
        if((string)$response->state == 'OK' || (string)$response->result->state == 'OK') {
            return response()->json([
                'success' => true,
                'state' => (string)$response->state,
            ]);
        }
    }

    public function getTransactionStatus(Request $request, KiasServiceInterface $kias){
        $kias->_sId = $request->Sid;
        $response = $kias->userGetDictiToBitrix($request->dictiName);
        if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text,
            ]);
        }
        if($response->StatusList->row){
            return response()->json([
                'success' => true,
                'row' => $response->StatusList,
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Произошла ошибка'
        ]);
    }

    public function getUserList(Request $request, KiasServiceInterface $kias){
        $kias->_sId = $request->Sid;
        $response = $kias->request('User_CicGetUserList', []);
        if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text,
            ]);
        }
        if($response->LIST){
            return response()->json([
                'success' => true,
                'row' => $response->LIST,
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Произошла ошибка'
        ]);
    }
}
