<?php

namespace Tests\Carnival\Unit\Data\Hooks;

use Carnival\Hooks\Event;

class ExampleHook implements Event {

    protected $text;

    public function __construct(string $text) {
        $this->text = $text;
    }
    
    public function setText(string $text) : void {
        $this->text = $text;
    }

    public function getText() : string {
        return $this->text;
    }
}