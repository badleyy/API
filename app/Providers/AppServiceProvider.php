<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Custom Service Bindings
        $this->app->bind('App\Business\Interfaces\IProductsService', 'App\Business\Services\ProductsService');
        $this->app->bind('App\Business\Interfaces\IRafflesService', 'App\Business\Services\RafflesService');
        $this->app->bind('App\Business\Interfaces\ITicketsService', 'App\Business\Services\TicketsService');
    }
}
