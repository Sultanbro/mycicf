<?php

namespace App\Providers;

use App\Library\Services\Kias;
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
            $session = false;
            if(Auth::check()){
                $session = Auth::user()->session_id;
            }
            $kias = new Kias();
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
