<?php

namespace HtmlBuilder;

interface TagInterface
{

    public function __construct(array $attributes, array $inner = null);

    public function __toString() : string;

    public function __call($name, $arguments) : TagInterface;

}