<?php

namespace Carnival\Language;

use Carnival\Language\Contracts\Language;
use Illuminate\Support\Collection;

class LanguageManager {
    private Collection $languages;

    public function __construct() {
        $this->languages = collect();
    }

    public function register(Language $language) : void {
        $this->languages->put(get_class($language), $language);
    }

    public function get(string $languageClass) : ?Language {
        return $this->languages->get($languageClass);
    }

    public function getAll() : Collection {
        return $this->languages->values();
    }
}
