<?php


namespace Fluent;


class FluentCounter implements FluentCounterInterface
{

    private $count;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    public function count() : FluentCounterInterface
    {
        $this->count++;
        return $this;
    }

    public function getCount() : int
    {
        return $this->count;
    }

}