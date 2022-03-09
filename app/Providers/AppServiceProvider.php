<?php

namespace App\Providers;

use Braintree\Gateway;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'yy7ksvx74yw6rcjv',
                'publicKey' => 'cxwtv7z3d3fvjcgh',
                'privateKey' => 'ce75e89243b0e22cacabf66386ab8835'
            ]);
        });
    }
}
