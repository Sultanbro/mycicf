<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserToken extends Model
{
    public static function setToken($token){
        $table = new self();
        $table->ISN = Auth::user()->ISN;
        $table->token = $token;
        return $table->save();
    }
}
