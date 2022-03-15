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
                'merchantId' => 'hbkcy784tk2gvn7z',
                'publicKey' => 'ng88jk6hsjhpbt77',
                'privateKey' => '12e8f098c41dcb22fd0a2cc720d5ea94'
            ]);
        });
    }
}
