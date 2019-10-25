<?php

namespace Fluent;

interface FluentCounterInterface
{

    public function count() : self;

    public function getCount() : int;

}