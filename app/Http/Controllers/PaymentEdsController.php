<?php

namespace App\Http\Controllers;

use App\Branch;
use App\TblForPayeds;
use Illuminate\Http\Request;

class PaymentEdsController extends Controller
{
    public function payout(Request $request){
        if(isset($request->token) && $request->token == 'ef292d4f1f2429cae344d090cc29b675' && isset(Branch::where('kias_id',$request->isn)->first()->id)) {
            $payout = TblForPayeds::where('signed', 1)->where('id','>=',$request->id)->get();   //->select('id', 'full_data')
            return response()->json([
                'code' => 200,
                'payout' => $payout
            ]);
        }
    }
}
