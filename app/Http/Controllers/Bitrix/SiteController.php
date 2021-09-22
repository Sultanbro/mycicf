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
        }else if($response->StatusList->row){
            for ($i=0; $i< count($response->StatusList->row); $i++){
                $row[] = [
                    'isn' => (int)$response->StatusList->row[$i]->isn,
                    'parent_isn' => (int)$response->StatusList->row[$i]->parentisn,
                    'short_name' => (string)$response->StatusList->row[$i]->shortname,
                    'fullname' => (string)$response->StatusList->row[$i]->fullname,
                    'code' => (int)$response->StatusList->row[$i]->code,
                    'numcode' => (int)$response->StatusList->row[$i]->numcode,
                    'n_kids' => (int)$response->StatusList->row[$i]->n_kids,];
            }
            return response()->json([
                'success' => true,
                'row' => $row,
            ]);
        } else if($response->StagesList->row){
            for ($i=0; $i< count($response->StagesList->row); $i++){
                $row[] = [
                    'isn' => (int)$response->StagesList->row[$i]->isn,
                    'parent_isn' => (int)$response->StagesList->row[$i]->parentisn,
                    'short_name' => (string)$response->StagesList->row[$i]->shortname,
                    'fullname' => (string)$response->StagesList->row[$i]->fullname,
                    'code' => (int)$response->StagesList->row[$i]->code,
                    'numcode' => (int)$response->StagesList->row[$i]->numcode,
                    'n_kids' => (int)$response->StagesList->row[$i]->n_kids,];
        }
            return response()->json([
                'success' => true,
                'row' => $row,
            ]);
        } else if($response->DictiList->row){
            for ($i=0; $i< count($response->DictiList->row); $i++){
                $row[] = [
                    'isn' => (int)$response->DictiList->row[$i]->isn,
                    'parent_isn' => (int)$response->DictiList->row[$i]->parentisn,
                    'fullname' => (string)$response->DictiList->row[$i]->fullname,
                    'short_name' => (string)$response->DictiList->row[$i]->shortname,
                    'code' => (int)$response->DictiList->row[$i]->code,
                    'numcode' => (int)$response->DictiList->row[$i]->numcode,
                    'n_kids' => (int)$response->DictiList->row[$i]->n_kids,];
            }
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

    public function getUserList(Request $request, KiasServiceInterface $kias){
        $kias->_sId = $request->Sid;
        $response = $kias->request('User_CicGetUserList', []);
//        dd(count($response->LIST->row));
        if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text,
            ]);
        }
        if($response->LIST){
//            dd($response->LIST);
            for ($i=0; $i< count($response->LIST->row); $i++){
                $row[] = [
                    'isn' => (int)$response->LIST->row[$i]->ISN,
                    'fullname' => (string)$response->LIST->row[$i]->FullName,
                    'parent_isn' => (int)$response->LIST->row[$i]->ParentISN,
                    'kids' => (int)$response->LIST->row[$i]->Kids,
                    'duty' => (string)$response->LIST->row[$i]->Duty,
                    'birthday' => (string)$response->LIST->row[$i]->Birthday];
            }
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

    public function getSubject(Request $request, KiasServiceInterface $kias){
        $kias->_sId = $request->Sid;
        $response = $kias->request('User_CicSearchSubject', [
            'IIN' => $request->iin,
        ]);
        if(isset($response->ROWSET) && count(get_object_vars($response->ROWSET)) == 0 && (string)$response->NotFound == '0') {
            return response()->json([
                'success' => false,
                'error' => 'Пользователь не найден!',
            ]);
        }else if($response->error) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text,
            ]);
        }else if($response->ROWSET->row){
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
        if($response->error && $response->error->text != 'Ошибка привязки пользователя ЕСБД<->КИАС') {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error,
            ]);
        } else if($response->ROWSET->row || $response->error->text == 'Ошибка привязки пользователя ЕСБД<->КИАС'){
            return response()->json([
                'success' => true,
                'iin' => $request->iin,
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Произошла ошибка'
        ]);
    }
}
