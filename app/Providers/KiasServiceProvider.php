<?php

namespace App\Providers;

use App\Library\Services\Kias;
use App\Library\Services\Mocks\KiasMock;
use Debugbar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Library\Services\KiasServiceInterface;

class KiasServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(KiasServiceInterface::class, function () {
            Debugbar::startMeasure('KiasServiceInterface initialization');
            {
                $session = null;
                if (Auth::check()) {
                    $session = Auth::user()->session_id;
                }

                if (config('kias.mock.enabled')) {
                    Debugbar::info('Using mocked Kias Service');
                    $kias = KiasMock::instance();
                } else {
                    Debugbar::info('Using real Kias Service');
                    $kias = Kias::instance();
                }

                $kias->init($session);
            }
            Debugbar::stopMeasure('KiasServiceInterface initialization');
            return $kias;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Debugbar::startMeasure('KiasServiceProvider::boot');
        Debugbar::stopMeasure('KiasServiceProvider::boot');
    }
}
