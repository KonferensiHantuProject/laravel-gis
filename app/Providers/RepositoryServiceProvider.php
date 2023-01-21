<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        // Home
        $this->app->bind(
            'App\Interfaces\HomeInterface',
            'App\Repositories\HomeRepository'
        );

        // Map
        $this->app->bind(
            'App\Interfaces\MapInterface',
            'App\Repositories\MapRepository'
        );

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
