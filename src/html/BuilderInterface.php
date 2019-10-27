<?php

namespace HtmlBuilder;

interface BuilderInterface
{

    public function create(string $tag, array $inner = null, array $attributes = []) : TagInterface;

}