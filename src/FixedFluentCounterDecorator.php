<?php

namespace Fluent;

class FixedFluentCounterDecorator implements FluentCounterInterface
{

    private $counter;

    public function __construct(FluentCounterInterface $counter)
    {
        $this->counter = $counter;
    }

    public function count() : FluentCounterInterface
    {
        echo __METHOD__ . PHP_EOL;
        $this->counter->count();
        return $this;
    }

    public function getCount() : int
    {
        return $this->counter->getCount();
    }

}