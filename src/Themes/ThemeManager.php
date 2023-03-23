<?php

namespace Carnival\Themes;

use Carnival\Themes\Theme;
use Illuminate\Support\Collection;

class ThemeManager {

    protected Collection $themes;

    public function __construct() {
        $this->themes = collect();
    }

    function register(Theme $theme) : void {
        $this->themes->put(get_class($theme), $theme);
    }

    function get(string $themeClass) : Theme {
        return $this->themes->get($themeClass);
    }

    function getAll() : Collection {
        return $this->themes->values();
    }
}