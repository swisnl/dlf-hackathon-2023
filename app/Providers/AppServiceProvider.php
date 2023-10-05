<?php

namespace App\Providers;

use App\Services\CO2CalculatorInterface;
use App\Services\CO2viaCnaught;
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
            fn () => new CO2viaCnaught(config('services.cnaught.api_key'))
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
