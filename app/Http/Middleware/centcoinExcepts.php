<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class centcoinExcepts
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
        if(in_array(Auth::user()->branch->duty, User::getCentcoinExcepts()))
            abort(419, 'У вас нет доступа для просмотра этой страницы');
        return $next($request);
    }
}
