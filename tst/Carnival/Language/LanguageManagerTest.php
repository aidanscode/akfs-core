<?php

namespace Tests\Carnival\Language;

use Carnival\Language\Contracts\Language;
use Carnival\Language\LanguageManager;
use Mockery;
use Tests\Carnival\CarnivalTestCase;

class LanguageManagerTest extends CarnivalTestCase {
    private LanguageManager $languageManager;
    private Language $language;

    protected function setUp() : void {
        parent::setUp();

        $this->languageManager = new LanguageManager;
        $this->language = Mockery::mock(Language::class);
    }

    public function testRegister() {
        $this->languageManager->register($this->language);
        $this->assertEquals(collect([$this->language]), $this->languageManager->getAll());
    }

    public function testRegisterTwice() {
        $this->languageManager->register($this->language);
        $this->languageManager->register($this->language);
        $this->assertEquals(collect([$this->language]), $this->languageManager->getAll());
    }

    public function testGet() {
        $this->languageManager->register($this->language);
        $this->assertEquals($this->language, $this->languageManager->get(get_class($this->language)));
    }

    public function testGetAllWithNoneRegistered() {
        $this->assertEquals(collect(), $this->languageManager->getAll());
    }
}
