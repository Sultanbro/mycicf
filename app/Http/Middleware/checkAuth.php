<?php

namespace App\Http\Middleware;

use App\Library\Services\KiasServiceInterface;
use App\User;
use Closure;
use Debugbar;
use Illuminate\Support\Facades\Auth;

class checkAuth
{
    /**
     * @var User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
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

        Debugbar::measure('Kias::Init in middleware', function () use ($kias) {
            $kias->initSystem();
        });

        Debugbar::measure('Kias::Get user data', function () use ($kias) {
            (new User)->getUserData($kias);
        });


        return $next($request);
    }
}
