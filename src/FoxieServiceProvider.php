<?php

namespace Xoyal\Foxiedial;

use Illuminate\Support\ServiceProvider;

class FoxieServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/config/constant_error.php', 'constant_error'
        );

        $this->publishes([
            __DIR__.'/config/constant_error.php' => config_path('constant_error.php'),
        ]);
    }

    public function register()
    {

    }

}