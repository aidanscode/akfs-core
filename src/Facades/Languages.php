<?php

namespace Carnival\Facades;

use Illuminate\Support\Facades\Facade;

class Languages extends Facade {
    protected static function getFacadeAccessor() {
        return 'languages';
    }
}
