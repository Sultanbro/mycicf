<?php

namespace App\Http\Middleware;

use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkSession
{
    public $kias;

    public function __construct(KiasServiceInterface $kias)
    {
        $this->kias = $kias;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  KiasServiceInterface $kias
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $kias = $this->kias;

        \Debugbar::startMeasure('checkSession::handle::kias_request::User_CicHelloSvc');
        $response = $kias->request('User_CicHelloSvc', []);
        \Debugbar::stopMeasure('checkSession::handle::kias_request::User_CicHelloSvc');
        if($response->error){
            $kias->_sId = null;
            if(!$this->reAuthenticate()){
                return redirect('/');
            }
        }
        return $next($request);
    }

    public function reAuthenticate() {
        $kias = $this->kias;
        $user = Auth::user();
        \Debugbar::startMeasure('checkSession::reAuthenticate::auth-kias');
        $response = $kias->authenticate($user->username, $user->password_hash);
        \Debugbar::stopMeasure('checkSession::reAuthenticate::auth-kias');

        if($response->error) {
            Auth::logout();
            return false;
        }

        $user->session_id = $response->Sid;
        $kias->_sid= $response->Sid;
        $user->save();

        return true;
    }
}
