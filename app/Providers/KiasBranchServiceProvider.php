<?php

namespace App\Providers;

use App\Library\Services\KiasBranch\KiasBranchService;
use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use Illuminate\Support\ServiceProvider;

class KiasBranchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            KiasBranchServiceInterface::class,
            KiasBranchService::class
        );
    }
}
