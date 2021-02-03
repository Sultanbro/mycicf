<?php

namespace App\Providers;

use App\Library\Services\Kias;
use App\Library\Services\KiasMock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;


class KiasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\KiasServiceInterface', function ($app) {
            $session = null;
            if(Auth::check()){
                $session = Auth::user()->session_id;
            }

            if (config('kias.mock')) {
                $kias = new KiasMock();
            } else {
                $kias = new Kias();
            }
            $kias->init($session);
            return $kias;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
