<?php

namespace App\Http\Middleware;

use Closure;

class BitrixAuthenticate
{
    const BITRIX_AUTH_TOKEN = 'Xq4L4vaCfa2sRgUMTvZa';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if ($request->header('token', null) === self::BITRIX_AUTH_TOKEN){
            return $next($request);
//        }
//        return response()->json([
//            'code' => '419',
//            'error' => 'Добавьте токен или проверьте на правильность'
//        ]);
    }
}
