<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Refund;
use App\Library\Services\SendEmailService;

class EdsController extends Controller
{
    protected $sendEmailService;
    public function __construct(SendEmailService $sendEmailService){
        $this->sendEmailService = $sendEmailService;
    }

    public function edsOD(KiasServiceInterface $kias){
        $od = Refund::where('confirmed',0)->select('rv_isn','id','confirmed','iin','iin_fail','claim_id')->get();
        return view('eds',compact('od'));
    }

    public function saveDocument(Request $request, KiasServiceInterface $kias) {
        $success = false;
        $info = $request->data;
        if($info['confirmed'] == 1){

            $rv[] = array(
                'isn' => 0,
                'delete' => 0,
                "valn1" => $info['rv_isn'],
                //"valc$i" => '',
                //"vald$i" => date('d.m.Y'),
            );

            $createLS = $kias->saveDocument($request->classISN,$request->emplISN,'',$rv,[]);
            if(isset($createLS->error)){
                $success = false;
                $error = (string)$createLS->error->text;
            } else {
                if(isset($createLS->DocISN)){
                    $buttonClick = $kias->buttonClick(intval($createLS->DocISN),'BUTTON1');
                    if(isset($buttonClick->error)){
                        $success = false;
                        $error = (string)$buttonClick->error->text;
                    } else {
                        $refund = Refund::find($info['id']);
                        if ($info['confirmed'] == 1) {
                            $refund->confirmed = 1;
                            $refund->main_doc_isn = $createLS->DocISN;
                        } else {
                            $refund->iin_fail = 1;
                        }
                        if ($refund->save()) {
                            $success = true;
                        }
                    }
                }
            }
        }

       return response()->json([
           'success' => isset($success) ? $success : true,
           'error' => isset($error) ? $error : ''
       ]);
    }

    public function getOrSetDoc(Request $request, KiasServiceInterface $kias){
        $success = false;
        $info = $request->data;
        if($info['confirmed'] == 1){
            //$setStatus = $kias->getOrSetDocs($info['rv_isn'],1,2522);    // 2522 - статус на подписании
            //if(isset($setStatus->error)){
            //    $success = false;
            //    $error = (string)$setStatus->error->text;
            //} else {
            //    if(isset($setStatus->Status)){
                    $refund = Refund::find($info['id']);
                    if ($info['confirmed'] == 1) {
                        $refund->confirmed = 1;
            //            $refund->main_doc_isn = $setStatus->Status;
                        $response = $kias->getSubject(null, null, null, $refund->iin);
                        $data = ['email' => isset($response->ROWSET->row[0]->EMAIL) ? (string)$response->ROWSET->row[0]->EMAIL : '', 'status' => 0, 'refund' => $refund];
                        $this->sendEmailService->sendMailRefundStatus($data);
                    } else {
                        $refund->iin_fail = 1;
                    }
                    if ($refund->save()) {
                        $success = true;
                    }
            //    }
            //}
        }
        return response()->json([
            'success' => isset($success) ? $success : true,
            'error' => isset($error) ? $error : ''
        ]);
    }

    public function saveFailStatus(Request $request, KiasServiceInterface $kias){
        $refund = Refund::find($request->data['id']);
        $refund->iin_fail = 1;
        try{
            if($refund->save()){
                $success = true;
                $response = $kias->getSubject(null, null, null, $refund->iin);
                $data = ['email' => isset($response->ROWSET->row[0]->EMAIL) ? (string)$response->ROWSET->row[0]->EMAIL : '', 'status' => 0, 'refund' => $refund];
                $this->sendEmailService->sendMailRefundStatus($data);
            }
        }catch (\Mockery\Exception $e){
            $success = false;
            $error = 'Возникла ошибка при сохранении статуса';
        }
        return response()->json([
            'success' => isset($success) ? $success : true,
            'error' => isset($error) ? $error : ''
        ]);
    }
}
