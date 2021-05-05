<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Library\Services\KiasServiceInterface;
use App\TblForPayEds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Refund;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EdsController extends Controller
{
    public function edsOD(KiasServiceInterface $kias){
        $od = Refund::where('confirmed',0)->select('rv_isn','id','confirmed','iin','iin_fail')->get();
        return view('eds',compact('od'));
    }
//file type = 1 sig.0=excel
    public function edsPO(KiasServiceInterface $kias){
        $po = TblForPayEds::where('filetype',"1")->orWhere('confirmed','0')->select('isn','name','date_sign','id','confirmed','plea','iin','iin_fail')->get();
        return view('eds-payout',compact('po'));
    }

    public function signQr(Request $request,KiasServiceInterface $kias){
        $files = [];
//        $ISN = isset($request->isn) ? $request->isn : '';
        $ISN = 3948353;
        $type = isset($request->type) ? $request->type : '';
        $format = isset($request->edsType) ? $request->edsType : '';
        $refISN = 40475701;
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
                $files[] = ['filepath' => (string)$file->FILEPATH, 'docISN' => (string)$file->ISN];
            }
        }
    }
    public function setQr(Request $request, KiasServiceInterface $kias){
//        dd($request->info);
//        dd($request->ISN);
//        dd($request);
        $pathh = $request->path;
//        dd($path);
        $trimmed = trim($pathh);
        //dd($path);
        $info_client=[];
        foreach ($request->info as $key => $value){
           if ($value['confirmed']==1){
                $value = $info_client;
           }
        }
        $destinationPath=storage_path('app/public/insurance_case_docs/results/123.xlsx');
        $success = \File::copy($pathh,$destinationPath);

//        $iin = Auth::user()->iin;
//        dd($iin);
//        $spreadsheet = $path;
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($destinationPath);
//        $spreadsheet= storage_path($request->path);
//        Изменения
        $sheet = $spreadsheet->getActiveSheet();
        //       QR тут костыльным методом ложится

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $qr=QrCode::format('png')->size(300)->generate($info_client);
//        dd($qr);
        $drawing->setPath(storage_path('app/public/qr.png')); // put your path and image here
        $drawing->setOffsetX(110);
        $drawing->setRotation(0);
        $drawing->setCoordinates('AE48');
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(45);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        $writer = new Xlsx($spreadsheet);
        $kek= 123;
        $writer->save(storage_path('app/public/insurance_case_docs/results/' . $request->ISN . '_insurance_payment.xlsx'));
//        dd('kek');
        //       QR тут костыльным методом ложится
        $sheet->setCellValue('AD18', $request->refundsum);//summa'


        //Вставка в файл
        $writer = new Xlsx($spreadsheet);
        $attachment = new Attachment();

        $writer->save(storage_path('app/public/insurance_case_docs/results/' . $kek . '_insurance_payment.xlsx'));
        $path = 'public/insurance_case_docs/results/' . $request->ISN . '_insurance_payment.xlsx';

        $attachment->insurance_case_id = session('caseId');
        $attachment->filename = $path;
        $attachment->type = 'insurancePayment';

        $attachment->save();

        $file = Storage::get($path);
        $base64String = base64_encode($file);
        //Making a Plea isn for uploading attachments

        $results = $kias->saveAttachment(
            40475701,
            basename($path),
            $base64String,
            'D'
        );

        return response()->json([
            'result' => isset($results->ISN) ? (string)$results->ISN : '',
            'base64String'=>$base64String,
            'success' => $request->data,
        ]);
    }

    public function saveDocument(Request $request, KiasServiceInterface $kias) {
        //$test = $kias->getDocRowAttr(1920701,'');
        //dd($test);
       $rv = [];
        if($request->data){
            $i = 1;
           foreach($request->data as $info){
               if($info['confirmed'] == 1){
                   $rv[] = array(
                       "valn$i" => $info['rv_isn'],
                       //"valc$i" => '',
                       //"vald$i" => date('d.m.Y'),
                   );
                   $i++;
               }
           }
       }
       if(count($rv) > 0){
            $save = $kias->saveDocument($request->classISN,$request->emplISN,'',$rv,[]);
            if(isset($save->error)){
                $success = false;
                $error = (string)$save->error->text;
            } else {
                if(isset($save->DocISN)){
                    $buttonClick = $kias->buttonClick(intval($save->DocISN),'BUTTON1');
                    if(isset($buttonClick->error)){
                        $success = false;
                        $error = (string)$buttonClick->error->text;
                    } else {
                        foreach ($request->data as $info) {
                            $refund = Refund::find($info['id']);
                            if ($info['confirmed'] == 1) {
                                $refund->confirmed = 1;
                                $refund->main_doc_isn = $save->DocISN;
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
       }
       return response()->json([
           'success' => isset($success) ? $success : true,
           'error' => isset($error) ? $error : ''
       ]);
    }

    public function saveFailStatus(Request $request){
        foreach($request->data as $info){
            $refund = Refund::find($info['id']);
            $refund->iin_fail = 1;
            try{
                if($refund->save()){
                    $success = true;
                }
            }catch (\Mockery\Exception $e){
                $success = false;
                $error = 'Возникла ошибка при сохранении статуса';
            }

        }
        return response()->json([
            'success' => isset($success) ? $success : true,
            'error' => isset($error) ? $error : ''
        ]);
    }
}
