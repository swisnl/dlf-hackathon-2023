<?php

namespace App\Providers;

use App\Services\CO2Calculator;
use App\Services\CO2CalculatorInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CO2CalculatorInterface::class,
            CO2Calculator::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
