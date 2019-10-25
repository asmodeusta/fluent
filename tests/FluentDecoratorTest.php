<?php

namespace Tests;

use Fluent\FixedFluentCounterDecorator;
use Fluent\FluentCounter;
use Fluent\FluentCounterDecorator;
use PHPUnit\Framework\TestCase;

class FluentDecoratorTest extends TestCase
{

    public function testDecorator()
    {
        $decorator = new FluentCounterDecorator(new FluentCounter(0));
        $this->expectOutputString(str_repeat(FluentCounterDecorator::class . '::count' . PHP_EOL, 3));
        $decorator->count()->count()->count();
    }

    public function testDecoratorFixed()
    {
        $decorator = new FixedFluentCounterDecorator(new FluentCounter(0));
        $this->expectOutputString(str_repeat(FixedFluentCounterDecorator::class . '::count' . PHP_EOL, 3));
        $decorator->count()->count()->count();
    }

}