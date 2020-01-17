<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserToken extends Model
{
    public static function setToken($token){
        if(self::where('token', $token)
            ->where('ISN', Auth::user()->ISN)
            ->first() === null){
                $table = new self();
                $table->ISN = Auth::user()->ISN;
                $table->token = $token;
                return $table->save();
        }else{
            return true;
        }
    }

    public static function getToken($ISN){
        $tokens = [];
        foreach (self::where('ISN', $ISN)->get() as $token){
            array_push($tokens, $token->token);
        }
        return sizeof($tokens) > 0 ? $tokens : false;
    }
}
