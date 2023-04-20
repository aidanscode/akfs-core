<?php

namespace Carnival\Providers;

use Carnival\Themes\ThemeManager;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('themes', fn() => new ThemeManager);
    }
}