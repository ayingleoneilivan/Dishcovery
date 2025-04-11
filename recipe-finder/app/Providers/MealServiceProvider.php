<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MealServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(MealService::class, function ($app) {
            return new MealService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
