<?php

namespace Carnival\Providers;

use Illuminate\Support\ServiceProvider;
use Carnival\Hooks\HookManager;

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
        $this->app->bind('hooks', function () {
            return new HookManager;
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
