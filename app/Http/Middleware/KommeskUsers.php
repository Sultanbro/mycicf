<?php

namespace App\Http\Middleware;

use App\Branch;
use App\Console\Commands\Branches;
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
    static function getKommeskAccess()
    {
        return array(
            1445744 => 1445744,
            3951884 => 3951884,
            4828704 => 4828704,
            4828702 => 4828702,
            4746219 => 4746219,
            934211 => 934211
        );
    }

    public function handle($request, Closure $next)
    {

        if(Auth::user()->branch->duty() &&
            Auth::user()->branch->kias_id != array_key_exists(Auth::user()->ISN,$this->getKommeskAccess())){
            return redirect()->route('coordination');
        }
        return $next($request);
    }
}
