<?php

namespace App\Http\Middleware;

use App\Permissions;
use App\Branch;
use Closure;
use Illuminate\Support\Facades\Auth;

class KommeskUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
/*    static function getKommeskAccess() //те у кого должен быть доступ в my.cic
    {
        return array(
            1445744 => 1445744,
            3951884 => 3951884,
            4828704 => 4828704,
            4828702 => 4828702,
            4746219 => 4746219,
            1287408 => 1287408
        );
    }*/

    public static function getAcceptedUsers(){
        $acceptedUsers = [];
        foreach (Permissions::whereIn('permission_id', [Permissions::ROLE_KOMMESK])->get() as $user){
            array_push($acceptedUsers, $user->user_isn);
        }
        return $acceptedUsers;
    }

    public function handle($request, Closure $next)
    {
        if(Auth::user()->branch->duty() &&
            Auth::user()->branch->kias_id != in_array(Auth::user()->ISN, self::getAcceptedUsers())){
            return redirect()->route('coordination');
        }
        return $next($request);
    }
}
