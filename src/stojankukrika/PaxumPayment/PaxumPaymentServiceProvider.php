<?php

namespace stojankukrika\PaxumPayment;

use Illuminate\Support\ServiceProvider;

class PaxumPaymentServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/paxum.php' => config_path('paxum.php')
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/paxum.php', 'paxum'
        );
    }
}