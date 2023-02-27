<?php

namespace Src\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Hooks\Hook as HookSystem;

class HookServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Bind Hook Service
         */
        $this->app->bind(Hook::class, function () {
            return new HookSystem;
        });
    }
}
