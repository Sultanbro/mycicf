<?php

namespace App\Http\Controllers;

use App\UserToken;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function setToken(Request $request){
        UserToken::setToken($request->token);
    }
}
