<?php

namespace Carnival\Themes;

use Carnival\Themes\Theme;
use Illuminate\Support\Collection;

class ThemeManager {

    protected Collection $themes;

    public function __construct() {
        $this->themes = collect();
    }

    function register(Theme $theme) {
        $this->themes->push($theme);
    }

    function get() : Collection {
        return $this->themes->values();
    }
}