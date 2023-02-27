<?php

namespace Src\Hooks;

use Src\Hooks\Event;
use Illuminate\Support\Collection;

class Hook {

    protected Collection $hooks;

    public function __construct() {
        $this->hooks = collect();
    }

    function add (string $eventClass, callable $callback) : void {
        data_set($this->hooks, $eventClass, data_get($this->hooks, $eventClass, collect())->push($callback));
    }
    
    function remove (string $eventClass) : void {    
        $this->hooks->forget($eventClass);
    }
    
    function execute (Event $event) : void {
        data_get($this->hooks, get_class($event), collect())->each(fn ($callback) => $callback($event));
    }

    /**
     * Functions for testing
     */
    function count () : int {
        return $this->hooks->count();
    }
}