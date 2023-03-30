<?php

namespace Tests\Carnival\Facades;

use Carnival\Facades\Languages;
use ReflectionClass;
use Tests\Carnival\CarnivalTestCase;

class LanguagesTest extends CarnivalTestCase {
    public function testGetFacadeAccessor() {
        $class = new ReflectionClass(Languages::class);
        $method = $class->getMethod('getFacadeAccessor');
        $method->setAccessible(true);
        $this->assertEquals('languages', $method->invoke(null));
    }
}
