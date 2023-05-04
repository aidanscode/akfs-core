<?php

namespace Carnival\Providers;

use Illuminate\Support\ServiceProvider;

class CarnivalServiceProvider extends ServiceProvider {
    
    public function boot(): void {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

}
