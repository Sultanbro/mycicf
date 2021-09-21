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
//        dd($response);
        if($response->error) {
            $success = false;
//            dd($success);
            $response = array(
                'success' => $success,
                'error' => $response->error->text,
            );
        }else if($response->UserDetails) {
            $ISN = $response->UserDetails->ISN;
            $sid = $response->Sid;
            $response = array(
                'success' => true,
                'data' => [
                    'isn' => (int)$ISN,
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

    public function getSubject(Request $request, KiasServiceInterface $kias){
        $kias->_sId = $request->Sid;
        $response = $kias->request('User_CicSearchSubject', [
            'IIN' => $request->iin,
        ]);
        if($response->NotFound) {
            return response()->json([
                'success' => false,
                'error' => 'Пользователь не найден!',
            ]);
        }
        if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text,
            ]);
        }
        if($response->ROWSET->row){
            $row = [];
            if ((string)$response->ROWSET->row->JURIDICAL === 'Y'){
                $row['orgname'] = (string)$response->ROWSET->row->ORGNAME;
            } else{
                $row['firstname'] = (string)$response->ROWSET->row->FIRSTNAME;
                $row['lastname'] = (string)$response->ROWSET->row->LASTNAME;
                $row['parentname'] = (string)$response->ROWSET->row->PARENTNAME;
            }
            $row['iin'] = (int)$response->ROWSET->row->IIN;
            $row['juridical'] = (string)$response->ROWSET->row->JURIDICAL;
            return response()->json([
                'success' => true,
                'row' => $row,
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Произошла ошибка'
        ]);
    }

    public function setSubject(Request $request, KiasServiceInterface $kias){
        $kias->_sId = $request->Sid;
        $response = $kias->request('User_CicSetSubject', [
            'IIN' => $request->iin,
            'FIRSTNAME' => $request->firstname,
            'LASTNAME' => $request->lastname,
            'PARENTNAME' => $request->parentname ? $request->parentname : '',
            'ORGNAME' => $request->orgName ? $request->orgName : '',
            'ECONOMICISN' => $request->economicIsn ? $request->economicIsn : '',
            'OKVDISN' => $request->okvdIsn ? $request->okvdIsn : '',
            'JURIDICAL' => $request->juridical ? $request->juridical : 'N',
            'RESIDENT' => $request->resident ? $request->resident : "Y",
            'COUNTRYISN' => $request->countryIsn ? $request->countryIsn : "",
            'SEXID' => $request->sexId ? $request->sexId : "",
            'DOCCLASSISN' => $request->docClassIsn ? $request->docClassIsn : "",
            'DOCNO' => $request->docNo ? $request->docNo : "",
        ]);
        if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error,
            ]);
        }
        if($response->ROWSET->row){
            $row = [];
            $row['iin'] = (int)$response->ROWSET->row->IIN;
            return response()->json([
                'success' => true,
                'row' => $row,
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Произошла ошибка'
        ]);
    }
}
