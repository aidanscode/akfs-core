<?php

namespace Carnival\Providers;

use Illuminate\Support\ServiceProvider;
use Carnival\Language\LanguageManager;

class LanguageServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind('languages', fn() => new LanguageManager);
    }
}
