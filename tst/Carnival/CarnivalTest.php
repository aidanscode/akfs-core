<?php

namespace Tests\Carnival;

use Illuminate\Support\Str;
use Mockery;
use Mockery\Exception\InvalidCountException;
use PHPUnit\Framework\TestCase;

class CarnivalTest extends TestCase {
    protected function tearDown () : void {
        parent::tearDown();

        if (class_exists('Mockery')) {
            if ($container = Mockery::getContainer()) {
                $this->addToAssertionCount($container->mockery_getExpectationCount());
            }

            try {
                Mockery::close();
            } catch (InvalidCountException $e) {
                if (! Str::contains($e->getMethodName(), ['doWrite', 'askQuestion'])) {
                    throw $e;
                }
            }
        }
    }
}