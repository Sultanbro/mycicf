<?php

namespace App\Http\Controllers;

use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Providers\KiasServiceProvider;
use Illuminate\Http\Request;

class CoordinationController extends Controller
{
    const AC_ATTRIBUTES_LABEL = 'ACattr';
    const COORDINATIONS_LABEL = 'Coordination';
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
        $AC = $SP = $SZ = $KV = $OL = $AD = $RV = $VC = $other = null;
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
                    'docdate' => (string)$row->period,
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
        //1256401
        if($response->BK->row[0]->docdate != 0){
            $VC = array();
            foreach ($response->BK->row as $row) {
                array_push($VC, [
                    'ISN' => (integer)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
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
                'VC' => $VC,
                'other' => $other
            )
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function getCoordinationInfo(Request $request, KiasServiceInterface $kias){
        $success = true;
        $error = "";
        $docIsn = $request->docIsn;
        $response = $kias->getCoordination($docIsn);
        if($response->error){
            $success = false;
            $error .= (string)$response->error->text;
            $result = [
                'success' => $success,
                'error' => (string)$error
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        $responseData = [];
        $attributes = [];
        $coordinations = [];
        foreach ((array)$response as $key => $value){
            if($value != "0"){
                if(in_array((string)$key, array_keys($this->attributeKeys())))
                {
                    array_push($attributes, [
                        'Name' => $this->attributeKeys()[$key],
                        'Value' => (string)$value
                    ]);
                }
                elseif($key === self::AC_ATTRIBUTES_LABEL)
                {
                    foreach ($value->row as $attribute) {
                        if($attribute->Value !== "0"){
                            array_push($attributes, [
                                'Name' => (string)$attribute->AttrName,
                                'Value' => (string)$attribute->Value,
                            ]);
                        }
                    }
                }
                elseif($key === self::COORDINATIONS_LABEL)
                {
                    foreach ($value->row as $coordination) {
                        array_push($coordinations, [
                            'FullName' => (string)$coordination->SubjNAME,
                            'Duty' => (string)$coordination->DutyName,
                            'Dept' => (string)$coordination->DeptName,
                            'Solution' => (string)$coordination->Solution,
                            'Date' => (string)$coordination->datesolution,
                            'Remark' => (string)$coordination->remark,
                            'ISN' => (string)$coordination->ISN,
                        ]);
                    }
                }
                elseif(in_array($key,$this->getCoordinationAttributes()))
                {
                    $responseData = array_merge($responseData , [
                        (string)$key => (string)$value
                    ]);
                }
                elseif($key == 'AttrLimit'){
                    $LimitISN = $value;
                }
                elseif($key == "KV"){
                    if((string)$response->DocClass == "787161") {
                        foreach ($value->row as $kvAttrs) {
                            foreach ($kvAttrs as $attrKey => $attrValue) {
                                if (in_array($attrKey, array_keys($this->getKVAttributes())) && (string)$attrValue !== "0") {
                                    array_push($attributes, [
                                        'Name' => (string)$this->getKVAttributes()[$attrKey],
                                        'Value' => (string)$attrValue,
                                    ]);
                                }
                            }
                            array_push($attributes, [
                                'Name' => '?????????????????? ??????????????????',
                                'Value' => 0,
                            ]);
                        }
                    }
                }
            }
        }
        $responseData = array_merge($responseData, [
            'Attributes' => $attributes,
            'Coordinations' => $coordinations,
            'Limit' => $LimitISN ?? null,
        ]);
        $result = [
            'success' => $success,
            'error' => $error,
            'response' => $responseData,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function setCoordination(Request $request){
        $success = true;
        $error = '';
        $kias = new Kias();
        $kias->initSystem();
        $response = $kias->setCoordination($request->DocISN, $request->ISN, $request->Solution, $request->Remark);
        if($response->error){
            $success = false;
            $error .= $response->error->text;
            $result = [
                'success' => $success,
                'error' => $error,
            ];

            return response()->json($result)->withCallback($request->input('callback'));
        }
        $result = [
            'success' => $success,
            'error' => $error,
            'result' => (string)$response->Result
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function attributeKeys(){
        return [
            'AttrDocType' => '?????? ????',
            'AttrDocID' => '?????????? ????',
            'AttrDocDate' => '???????? ????',
            'AttrLastDay' => '?????????????????? ???????? ????????????',
            'AttrDocAddr' => '??????????????',
            'AttrDocExe' => '??????????????????????',
            'AttrDocCoor1' => '?????????????????????? 1',
            'AttrDocDays' => '??????-???? ???????????????????????? ????????',
            'AttrDocCountDays' => '?????????? ??????-???? ????????',
            'AttrAmount' => '??????????',
        ];
    }

    public function getCoordinationAttributes(){
        return [
            'ISN',                  //ISN ????
            'DocClass',             //ISN ???????? ????
            'ID',                   //?????????? ????
            'Docdate',              //???????? ????
            'Fullname',             //?????? ????
            'Curator',              //?????????????? ????
            'SubjName',             //???????????????????????? ????????????????????????
            'SubjDept',             //?????????????????????? ????????????????????????
            'Remark',               //???????????????????? ?????????? ????
        ];
    }

    public function getKVAttributes(){
        return [
            'dept' => '????????????/??????????????????????????',
            'curator' => '?????? ????????????????',
            'agent' => '?????? ????????????',
            'VTS_Phis' => '???????? ?????? ??????.????????',
            'VTS_Jur' => '???????? ?????? ????.????????',
            'KBM_M' => '?????? M',
            'KBM_0' => '?????? 0',
            'KBM_1' => '?????? 1',
            'KBM_2' => '?????? 2',
            'KBM_3' => '?????? 3',
            'KBM_4' => '?????? 4',
            'KBM_5' => '?????? 5',
            'KBM_6' => '?????? 6',
            'KBM_7' => '?????? 7',
            'KBM_8' => '?????? 8',
            'KBM_9' => '?????? 9',
            'KBM_10' => '?????? 10',
            'KBM_11' => '?????? 11',
            'KBM_12' => '?????? 12',
            'KBM_13' => '?????? 13',
            'OGPO_PP' => '???????? ????',
            'OSE' => '??????',
            'Notarius' => '???????? ????',
            'OGPO_AO' => '???????? ????',
            'OGPO_OO' => '???????? ????',
        ];
    }

    public function getAttachments(Request $request, KiasServiceInterface $kias){
        $response = $kias->getAttachmentsList($request->docIsn);
        $attachments = [];
        if($response->error){
            $result = [
                'success' => false,
                'error' => (string)$response->error->text,
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        if(isset($response->LIST->row)){
            foreach ($response->LIST->row as $row){
                array_push($attachments, [
                    'URL' => "/getAttachment/{$row->ISN}/{$row->REFISN}/{$row->PICTTYPE}",
                    'FileName' => (string)$row->FILENAME,
                ]);
            }
        }
        $result = [
            'success' => true,
            'error' => "",
            'attachments' => $attachments,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }
}
