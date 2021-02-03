<?php

namespace App\Http\Middleware;

use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkAuth
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
        $kias = app(KiasServiceInterface::class);
        $kias->initSystem();
        (new User)->getUserData($kias);
        return $next($request);
    }
}
