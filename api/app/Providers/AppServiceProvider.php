<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\Agent\AgentServiceInterface', 'App\Services\Agent\AgentService');
        $this->app->bind(
            'App\Services\ProductDetail\ProductDetailServiceInterface',
            'App\Services\ProductDetail\ProductDetailService'
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
