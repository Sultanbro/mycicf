<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KommeskUser extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Session::get('authenticated', false)){
                return $next($request);
            }
            if (Auth::user()->ISN !== Auth::user()->level || in_array(Auth::user()->ISN, self::getAcceptedUsers())) {
                return $next($request);
            }
            abort(403, 'У вас нет доступа для просмотра данной страницы');
            return Redirect::back();
        });
    }

    public static function getAcceptedUsers(){
        $acceptedUsers = [];
        foreach (Permissions::whereIn('permission_id', [Permissions::ROLE_SUPERADMIN, Permissions::ROLE_KOMMESK])->get() as $user){
            array_push($acceptedUsers, $user->user_isn);
        }
        return $acceptedUsers;
    }


}
