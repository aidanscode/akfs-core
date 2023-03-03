<?php

namespace Tests\Unit\Hooks;

use Carnival\Hooks\Hook;
use Tests\Carnival\CarnivalTest;
use Tests\Carnival\Unit\Data\Hooks\ExampleHook;

class HookSystemTest extends CarnivalTest {

    protected $hookSystem;
    protected $exampleHook;

    public function setUp () : void {
        parent::setUp();

        $this->hookSystem = new Hook;
        $this->exampleHook = new ExampleHook("Hello World!");
    }

    public function testCanAddHookToHookList () {
        $this->addExampleHookToHookList();
        $this->assertEquals(1, $this->hookSystem->count(ExampleHook::class));
    }

    public function testCanRemoveHookFromHookList () {
        $this->addExampleHookToHookList();
        $this->assertEquals(1, $this->hookSystem->count(ExampleHook::class));
        
        $this->hookSystem->remove(ExampleHook::class);
        $this->assertEquals(0, $this->hookSystem->count(ExampleHook::class));
    }

    public function testCanExecuteHooksInHookList () {
        $this->addExampleHookToHookList();
        $this->assertEquals(1, $this->hookSystem->count(ExampleHook::class));

        $this->assertEquals("Hello World!", $this->exampleHook->getText());

        $this->hookSystem->execute($this->exampleHook);

        $this->assertEquals("Goodbye World!", $this->exampleHook->getText());
    }

    public function testCanExecuteMultipleHooksForTheSameEvent () {
        $this->addMultipleHooksToHookList();
        $this->assertEquals(2, $this->hookSystem->count(ExampleHook::class));

        $this->assertEquals("Hello World!", $this->exampleHook->getText());

        $this->hookSystem->execute($this->exampleHook);

        $this->assertEquals("Goodnight World!", $this->exampleHook->getText());
    }

    private function addExampleHookToHookList () : void {
        $this->hookSystem->add(ExampleHook::class, function () {
            $this->exampleHook->setText('Goodbye World!');
        });
    }

    private function addMultipleHooksToHookList () : void  {
        $this->hookSystem->add(ExampleHook::class, function () {
            $this->exampleHook->setText('Goodbye World!');
        });

        $this->hookSystem->add(ExampleHook::class, function () {
            $this->exampleHook->setText('Goodnight World!');
        });
    }
}