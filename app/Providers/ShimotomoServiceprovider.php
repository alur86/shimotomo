<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ShimotomoPay;

class ShimotomoServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
          $this->app->bind('App\Services\ShimotomoPay', function ($app) {
          return new ShimotomoPay();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
