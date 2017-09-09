<?php

namespace Kneu\Portfolio\Providers;

use Illuminate\Support\ServiceProvider;
use Kneu\Api;

class KneuApiServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Api::class, function () {
            $api = new Api();
            $api->serverToken(config('kneu.client_id'), config('kneu.client_secret'));
            return $api;
        });
    }

    public function provides()
    {
        return [Api::class];
    }
}
