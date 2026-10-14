<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminAuth
{
    public $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->user === null){
            return redirect('/');
        }
        //TODO check isn in permissions
        return $next($request);
    }
}
