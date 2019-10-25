<?php


namespace Fluent;


class FluentCounterDecorator implements FluentCounterInterface
{

    private $counter;

    public function __construct(FluentCounterInterface $counter)
    {
        $this->counter = $counter;
    }

    public function count() : FluentCounterInterface
    {
        echo __METHOD__ . PHP_EOL;
        return $this->counter->count();
    }

    public function getCount() : int
    {
        return $this->counter->getCount();
    }
}