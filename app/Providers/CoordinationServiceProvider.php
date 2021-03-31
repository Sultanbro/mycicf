<?php

namespace App\Providers;

use App\Library\Services\CoordinationServiceInterface;
use App\Library\Services\Kias;
use App\Library\Services\Mocks\KiasMock;
use Illuminate\Support\ServiceProvider;
use Debugbar;
use Illuminate\Support\Facades\Auth;

class CoordinationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CoordinationServiceInterface::class, function (){
            Debugbar::startMeasure('CoordinationServiceInterface initialization');
            {
                $session = null;
                if (Auth::check()){
                    $session = Auth::user()->session_id;
                }
                if(config('kias.mock.enabled')){
                    Debugbar::info('Using mocked Kias Service');
                    $kias = KiasMock::instance();
                }else{
                    Debugbar::info('Using real Kias Service');
                    $kias = Kias::instance();
                }
                $kias->init($session);
            }
            Debugbar::stopMeasure('CoordinationServiceInterface initialization');
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
        Debugbar::startMeasure('CoordinationServiceProvider::boot');
        Debugbar::stopMeasure('CoordinationServiceProvider::boot');
    }
}
