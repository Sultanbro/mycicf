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
    public function handle($request, Closure $next)
    {
        if(Auth::user()->branch->duty() &&
            Auth::user()->branch->kias_id != 1445744 &&
            Auth::user()->branch->kias_id != 3951884){
            return redirect()->route('coordination');
        }
        return $next($request);
    }
}
