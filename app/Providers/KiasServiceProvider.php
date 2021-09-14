<?php

namespace App\Providers;

use App\Library\Services\Kias;
use App\Library\Services\Mocks\KiasMock;
use Barryvdh\Debugbar\LaravelDebugbar as Debugbar;
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
            $session = null;
            if (Auth::check()) {
                $session = Auth::user()->session_id;
            }

            if (config('kias.mock.enabled')) {
                $kias = KiasMock::instance();
            } else {
                $kias = Kias::instance();
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
    public function boot() {
    }
}
