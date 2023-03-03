<?php

namespace Carnival\Providers;

use Illuminate\Support\ServiceProvider;
use Carnival\Hooks\Hook;

class HookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Bind Hook Service
         */
        $this->app->bind('hook', function () {
            return new Hook;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
