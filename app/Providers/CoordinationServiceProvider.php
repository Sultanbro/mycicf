<?php

namespace App\Providers;

use App\Library\Services\CoordinationService;
use App\Library\Services\CoordinationServiceInterface;
use App\Library\Services\Mocks\CoordinationServiceMock;
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
                    $coordination = CoordinationServiceMock::instance();
                }else{
                    Debugbar::info('Using real Kias Service');
                    $coordination = CoordinationService::instance();
                }
            }
            Debugbar::stopMeasure('CoordinationServiceInterface initialization');
            return $coordination;
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
