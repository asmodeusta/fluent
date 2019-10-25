<?php

namespace Tests;

use Fluent\FluentCounter;
use Fluent\FluentCounterImmutable;
use PHPUnit\Framework\TestCase;

class FluentCounterTest extends TestCase
{

    public function testFluentSimple()
    {
        $counter = new FluentCounter(0);
        $counter->count()->count()->count();
        $this->assertEquals( 3, $counter->getCount());
    }

    public function testFluentImmutable()
    {
        $counter = new FluentCounterImmutable(0);
        $counter->count()->count()->count();
        $this->assertEquals(3, $counter->getCount());
    }

    public function testFluentImmutableFixed()
    {
        $counter = new FluentCounterImmutable(0);
        $counter = $counter->count()->count()->count();
        $this->assertEquals(3, $counter->getCount());
    }

}