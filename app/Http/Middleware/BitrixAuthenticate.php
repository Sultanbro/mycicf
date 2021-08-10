<?php

namespace App\Http\Middleware;

use Closure;

class BitrixAuthenticate
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
        if ($request->token){
            return $next($request);
        }
        return response()->json([
            'code' => '419',
            'error' => 'Unauthorized'
        ]);
    }
}
