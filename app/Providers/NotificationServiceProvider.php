<?php

namespace App\Providers;

use App\Library\Services\Mocks\NotificationServiceMock;
use App\Library\Services\NotificationService;
use App\Library\Services\NotificationServiceInterface;
use Debugbar;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(NotificationServiceInterface::class, function () {

            if (config('notifications.mock.enabled')) {
                $service = new NotificationServiceMock();
            } else {
                $service = new NotificationService();
            }

            return $service;
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
