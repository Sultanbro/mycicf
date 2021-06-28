<?php

namespace App\Http\Controllers;

use App\TblForPayRequest;
use Illuminate\Http\Request;

class PaymentRequestEdsController extends Controller
{
    public function payout(Request $request){
        if(isset($request->token) && $request->token == 'ef292d4f1f2429cae344d090cc29b675' && isset(Branch::where('kias_id',$request->isn)->first()->id)) {
            $payout = TblForPayRequest::where('signed', 1)->where('id','>',$request->id)->get();   //->select('id', 'full_data')
            return response()->json([
                'code' => 200,
                'payout' => $payout
            ]);
        }
    }
}
