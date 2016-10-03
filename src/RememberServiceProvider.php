<?php

namespace Appitized\Remember;

use Illuminate\Support\ServiceProvider;

class RememberServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
