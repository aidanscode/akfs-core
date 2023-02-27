<?php

namespace Src\Hooks\Facades;

use Src\Hooks\Hook as HookSystem;
use Illuminate\Support\Facades\Facade;

class Hook extends Facade {

    protected static function getFacadeAccessor() {
        return HookSystem::class;
    }
}