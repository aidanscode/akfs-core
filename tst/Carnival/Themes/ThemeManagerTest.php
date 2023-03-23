<?php

namespace Tests\Carnival\Themes;

use Carnival\Themes\Theme;
use Carnival\Themes\ThemeManager;
use Mockery;
use Tests\Carnival\CarnivalTestCase;

class ThemeManagerTest extends CarnivalTestCase {

    protected $themeManager;
    protected $exampleTheme;

    public function setUp() : void {
        $this->themeManager = new ThemeManager;
        $this->exampleTheme = Mockery::mock(Theme::class);
    }

    public function testCanRegisterExampleTheme() {
        $this->assertFalse($this->themeManager->getAll()->contains($this->exampleTheme));
        $this->registerExampleTheme();
        $this->assertTrue($this->themeManager->getAll()->contains($this->exampleTheme));
    }

    public function testCantRegisterExampleThemeMoreThanOnce() {
        $this->assertFalse($this->themeManager->getAll()->contains($this->exampleTheme));
        $this->registerExampleTheme();
        $this->registerExampleTheme();
        $this->assertEquals(1, count($this->themeManager->getAll()));
    }

    public function testCanGetThemeFromThemeManagerThatIsRegistered() {
        $this->assertFalse($this->themeManager->getAll()->contains($this->exampleTheme));
        $this->registerExampleTheme();
        $this->assertEquals($this->exampleTheme, $this->themeManager->get(get_class($this->exampleTheme)));
    }

    private function registerExampleTheme() {
        $this->themeManager->register($this->exampleTheme);
    }
}