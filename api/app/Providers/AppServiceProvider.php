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
        $this->app->bind(
            'App\Services\Booking\BookingServiceInterface',
            'App\Services\Booking\BookingService'
        );
        $this->app->bind(
            'App\Services\Nationality\NationalityServiceInterface',
            'App\Services\Nationality\NationalityService'
        );
        $this->app->bind(
            'App\Services\Product\ProductServiceInterface',
            'App\Services\Product\ProductService'
        );
        $this->app->bind(
            'App\Services\Consultant\ConsultantServiceInterface',
            'App\Services\Consultant\ConsultantService'
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
