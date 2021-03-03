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
        $user = Auth::user()->branch;
        /*dd($user);*/
        if($user->duty() || $user->id === 100389){
            return redirect()->route('coordination');
        }
        return $next($request);
    }
}
