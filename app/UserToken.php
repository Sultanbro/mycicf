<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserToken extends Model
{
    public static function setToken($token){
        $table = self::where('ISN', Auth::user()->ISN)->first();
        if($table === null){
            $table = new self();
        }
        $table->ISN = Auth::user()->ISN;
        $table->token = $token;
        return $table->save();
    }

    public static function getToken($ISN){
        return self::where('ISN', $ISN)->first()->token ?? false;
    }
}
