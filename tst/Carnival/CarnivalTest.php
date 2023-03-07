<?php

namespace Tests\Carnival;

use Mockery;
use Mockery\Exception\InvalidCountException;
use PHPUnit\Framework\TestCase;

class CarnivalTest extends TestCase {
    protected function tearDown() : void {
        parent::tearDown();

        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }

        Mockery::close();
    }
}