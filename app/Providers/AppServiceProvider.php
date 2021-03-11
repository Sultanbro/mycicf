<?php

namespace App\Providers;

use App;
use App\Debug\GitDataCollector;
use App\Debug\KiasRequestCollector;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // \Debugbar::addCollector(new GitDataCollector('git'));
        \Debugbar::addCollector(new KiasRequestCollector('kias'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!App::isLocal()){
            URL::forceScheme('https');
        }
    }
}
