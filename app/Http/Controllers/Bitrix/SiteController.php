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
        $error = '';
        $success = true;
        $username = $request->username;
        $password = $request->password;
        $response = $kias->authenticate($username, hash('sha512', $password));
        if($response->error) {
            $success = false;
            $response = array(
                'success' => $success,
                'error' => (string)$response->error->text,
            );
        }
        if($success && $response->UserDetails) {
            $ISN = $response->UserDetails->ISN;
            $sid = $response->Sid;
            $response = array(
                'success' => $success,
                'error' => $error,
                'data' => [
                    'isn' => (string)$ISN,
                    'auth_token' => (string)$sid,
                ]
            );
        }
        return response()->json($response)->withCallback($request->input('callback'));
    }

    public function renewal(Request $request, KiasServiceInterface $kias) {
        $request->auth_token = '601d6bb9-3d7d-42f8-a756-7773cc4d559c';
        $error = '';
        $success = true;
        $renew = $kias->request('User_CicHelloSvc', [
            'Sid' => $request->auth_token
        ]);
        if($renew->error) {
            $success = false;
            $response = array(
                'success' => $success,
                'error' => (string)$renew->error->text,
            );
        }
        if($renew->result->state == 'ok') {
            $renew = array(
                'success' => $success,
                'error' => $error,
                'data' => [
                    'auth_token' => (string)$request->auth_token,
                ]
            );
        }
        if($renew->result->state == 'ok'){
            return response()->json($renew)->withCallback($request->input('callback'));
        }
    }

    public function getTransactionStatus(Request $request, KiasServiceInterface $kias){
        $request->dictiName = 'CalcStatus';
        $error = '';
        $success = true;
        $response = $kias->request('User_GetDictiToBitrix', [
            'DictiName' => $request->dictiName,
            'Sid' => 'c83986e2-75ba-45e0-b713-860daed87b10'
        ]);
//        dd($response);
        if($response->error) {
            $success = false;
            $response = array(
                'success' => $success,
                'error' => (string)$response->error->text,
            );
        }
        if($response->result->state == 'ok') {
            $renew = array(
                'success' => $success,
                'error' => $error,
                'data' => [
                    'auth_token' => (string)$request->Sid,
                ]
            );
        }
        if($response->result->state == 'ok'){
            return response()->json($renew)->withCallback($request->input('callback'));
        }
    }

    public function getUserList(Request $request, KiasServiceInterface $kias){
        $error = '';
        $success = true;
        $response = $kias->request('User_CicGetUserList', [
            'Sid' => 'c83986e2-75ba-45e0-b713-860daed87b10'
        ]);
//        dd($response);
        if($response->error) {
            $success = false;
            $response = array(
                'success' => $success,
                'error' => (string)$response->error->text,
            );
        }
        if($response->result->state == 'ok') {
            $renew = array(
                'success' => $success,
                'error' => $error,
                'data' => [
                    'auth_token' => (string)$request->Sid,
                ]
            );
        }
        if($response->result->state == 'ok'){
            return response()->json($renew)->withCallback($request->input('callback'));
        }
    }
}
