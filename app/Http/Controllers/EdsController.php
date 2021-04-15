<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use App\TblForPayEds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Refund;

class EdsController extends Controller
{
    public function edsOD(KiasServiceInterface $kias){
        $od = Refund::where('confirmed',0)->select('rv_isn','id','confirmed','iin','iin_fail')->get();
        return view('eds',compact('od'));
    }

    public function edsPO(KiasServiceInterface $kias){
        $po = TblForPayEds::where('confirmed',"0")->select('isn','id','confirmed','iin','iin_fail')->get();
        return view('eds-payout',compact('po'));
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
