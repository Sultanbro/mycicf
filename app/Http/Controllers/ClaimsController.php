<?php

namespace App\Http\Controllers;

use App\User;
use App\Claim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClaimsController extends Controller
{
    public function getDevelopment() {
        return view('claims.development_claims');
    }

    public function saveDevelopment(Request $request){
        $error = '';
        $claim = new Claim;
        $claim->user_isn = Auth::user()->ISN;
        foreach($request->claims as $key => $field){
            $claim->setAttribute($key,$field);
        }
        if($claim->save()){
          $success = true;
        } else {
            $success = false;
            $error = 'Произошла ошибка записи в базу данных. Попробуйте чуть позже';
        }
        return response()->json([
            'success' => $success,
            'error' => $error
        ]);
    }

    public function listDevelopment(){
        $claims = Claim::where('claim_type','development')->orderBy('created_at','desc')->paginate(10);
        return view('claims.list.development',compact('claims'));
    }
}
