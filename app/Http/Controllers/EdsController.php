<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Refund;

class EdsController extends Controller
{
    public function edsOD(KiasServiceInterface $kias){
        $od = Refund::where('confirmed',0)->select('rv_isn','id','confirmed','iin','iin_fail','claim_id')->get();
        return view('eds',compact('od'));
    }

    public function saveDocument(Request $request, KiasServiceInterface $kias) {
        //$test = $kias->getDocRowAttr(1920701,'');
        //dd($test);
//       $rv = [];
//        if($request->data){
//            $i = 1;
//           foreach($request->data as $info){
//               if($info['confirmed'] == 1){
//                   $rv[] = array(
//                       "valn$i" => $info['rv_isn'],
//                       //"valc$i" => '',
//                       //"vald$i" => date('d.m.Y'),
//                   );
//                   $i++;
//               }
//           }
//       }
//       if(count($rv) > 0){
//            $save = $kias->saveDocument($request->classISN,$request->emplISN,'',$rv,[]);
//            if(isset($save->error)){
//                $success = false;
//                $error = (string)$save->error->text;
//            } else {
//                if(isset($save->DocISN)){
//                    $buttonClick = $kias->buttonClick(intval($save->DocISN),'BUTTON1');
//                    if(isset($buttonClick->error)){
//                        $success = false;
//                        $error = (string)$buttonClick->error->text;
//                    } else {
//                        foreach ($request->data as $info) {
//                            $refund = Refund::find($info['id']);
//                            if ($info['confirmed'] == 1) {
//                                $refund->confirmed = 1;
//                                $refund->main_doc_isn = $save->DocISN;
//                            } else {
//                                $refund->iin_fail = 1;
//                            }
//                            if ($refund->save()) {
//                                $success = true;
//                            }
//                        }
//                    }
//                }
//            }
//       }

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
                        //foreach ($request->data as $info) {
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
                        //}
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
            $setStatus = $kias->getOrSetDocs($info['rv_isn'],1,2522);    // 2522 - статус на подписании
            if(isset($setStatus->error)){
                $success = false;
                $error = (string)$setStatus->error->text;
            } else {
                if(isset($setStatus->Status)){
                    $refund = Refund::find($info['id']);
                    if ($info['confirmed'] == 1) {
                        $refund->confirmed = 1;
                        $refund->main_doc_isn = $setStatus->Status;
                    } else {
                        $refund->iin_fail = 1;
                    }
                    if ($refund->save()) {
                        $success = true;
                    }
                }
            }
        }
        return response()->json([
            'success' => isset($success) ? $success : true,
            'error' => isset($error) ? $error : ''
        ]);
    }

    public function saveFailStatus(Request $request){
        //foreach($request->data as $info){
            $refund = Refund::find($request->data['id']);
            $refund->iin_fail = 1;
            try{
                if($refund->save()){
                    $success = true;
                }
            }catch (\Mockery\Exception $e){
                $success = false;
                $error = 'Возникла ошибка при сохранении статуса';
            }
        //}
        return response()->json([
            'success' => isset($success) ? $success : true,
            'error' => isset($error) ? $error : ''
        ]);
    }

    public function testEds(){
        return view('eds');
    }

    public function getEdsTokenForSign(){
        $success = false;
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://ncalayer.uchet.kz:8080/getSignToken",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\n\t\"company_token\":\"7006cebf-82b9-4dbf-9cca-7d35d2eaf763\"\n}",
            CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        //$response = (object)['token' => 'c4906463-8544-11eb-bb63-000c296105aa'];
        //$response = json_decode((string)$response);
        if(isset($response->token)){
            $success = true;
        }
        return response()->json([
            'success' => $success,
            'result' => $response
        ]);
//        $client = new Client();
//        $res = $client->get('http://ncalayer.uchet.kz:8080/getSignToken', ['json' => ['company_token'=>'7006cebf-82b9-4dbf-9cca-7d35d2eaf763']]);
//        echo $res->getBody();
//        echo $res->getStatusCode();
    }

    public function edsByIsn(Request $request,KiasServiceInterface $kias){
        $files = [];
        $ISN = isset($request->isn) ? $request->isn : '';
        $type = isset($request->type) ? $request->type : 'A';
        $format = isset($request->edsType) ? $request->edsType : '';
        $refISN = isset($request->refISN) ? $request->refISN : '';
        $refID = isset($request->refID ) ? $request->refID  : '';
        $docClass = isset($request->docClass ) ? $request->docClass  : '';

        $sigFiles = $kias->getAttachmentPath($type,$refID,$format,$docClass,$refISN,$ISN);
        if(isset($sigFiles->error)){
            return response()->json([
                'success' => false,
                'result' => (string)$sigFiles->error->text
            ]);
        } else {
            foreach ($sigFiles->ROWSET->row as $file) {
                //$signedBase64 = base64_encode('192.168.1.36\FILESKIAS$\D\33\877\D33877881\3860996.sig');
                if($refISN != '') {
                    $attachment = $kias->getAttachmentData($refISN, intval($file->ISN), $type);
                    if (isset($attachment->FILEDATA, $attachment->FILENAME)) {
                        $signedBase64 = (string)$attachment->FILEDATA;
                    }
                }

                array_push($files, [
                    'filepath' => (string)$file->FILEPATH,
                    'docISN' => (string)$file->ISN,
                    'signedBase64' => isset($signedBase64) ? $signedBase64 : ''
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'result' => $files
        ]);
    }

    public function getPrintableOrderDocument(Request $request, KiasServiceInterface $kias){
        $dataParams = [];
        $printableList = (array)$kias->getPrintableDocumentList($request->isn, 1)->ROWSET->row;
        if(isset($printableList['params']->row)){
            foreach($printableList['params']->row as $item){
                $dataParams[] = $item;
            }
        }
        $printable = isset($request->isn) ? $kias->getPrintableOrderDocument($printableList, $dataParams) : null;
        if (isset($printable->Bytes, $printable->FileName)) {
            $base64Document = str_replace("\n", '', (string)$printable->Bytes);
            $success = true;
        }
        return response()->json([
            'success' => isset($base64Document) ? true : false,
            'result' => isset($base64Document) ? $base64Document : null
        ]);
    }

    public function saveEdsInfo(Request $request,KiasServiceInterface $kias){
        $data = $request->data;
        $response = $kias->cicSaveEDS($request->refIsn,$request->isn,$data['iin'],$data['name'],'',$data['tspDate'],$data['certificateValidityPeriod'],'');

        if(isset($response->error)){
            return response()->json([
                'success' => false,
                'result' => (string)$response->error->text
            ]);
        }
        //if(isset($response->result)) {
        return response()->json([
            'success' => true
        ]);
        //}
    }
}
