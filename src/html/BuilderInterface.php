<?php

namespace HtmlBuilder;

interface BuilderInterface
{

    public function create(string $tag, array $attributes = []) : TagInterface;

}