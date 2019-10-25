<?php

namespace Fluent;

class FluentCounterImmutable implements FluentCounterInterface
{

    private $count;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    public function count() : FluentCounterInterface
    {
        return new self(++$this->count);
    }

    public function getCount() : int
    {
        return $this->count;
    }

}