<?php

namespace LazyCrudGenerator;

use Illuminate\Support\ServiceProvider;

class LazyCrudGeneratorServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->commands(['LazyCrudGenerator\Console\Commands\LazyCrudGeneratorCommand']);
    }

    public function boot()
    {
        \Route::get('/crud', function () {
            echo 'lazy provider: OK';
        });
        $this->loadViewsFrom(__DIR__ . '/views', 'crudgenerator');

        $this->publishes([
            __DIR__ . '/Templates' => base_path('resources/templates'),
        ]);
    }

}
