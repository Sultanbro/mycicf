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


        if(Auth::user()->branch->duty()){
            return redirect()->route('coordination');
        }

/*       $user = Auth::user();
        dd($user);*/
        return $next($request);
    }
}
