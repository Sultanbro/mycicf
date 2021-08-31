<?php

namespace App\Providers;

use App\Library\Services\Quiz\QuizSaveService;
use App\Library\Services\Quiz\QuizSaveServiceInterface;
use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
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
            QuizSaveServiceInterface::class,
            QuizSaveService::class
        );
    }
}
