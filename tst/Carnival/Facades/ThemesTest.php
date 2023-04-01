<?php

namespace Tests\Carnival\Facades;

use Carnival\Facades\Themes;
use ReflectionClass;
use Tests\Carnival\CarnivalTestCase;

class ThemesTest extends CarnivalTestCase {
    public function testGetFacadeAccessor() {
        $class = new ReflectionClass(Themes::class);
        $method = $class->getMethod('getFacadeAccessor');
        $method->setAccessible(true);
        $this->assertEquals('themes', $method->invoke(null));
    }
}
