<?php

namespace HtmlBuilder;

use HtmlBuilder\Tags\Div;

class Builder implements BuilderInterface
{

    public function create(string $tag, $inner = null, array $attributes = []): TagInterface
    {
        if (is_null($inner)) {
            $inner = [];
        } elseif (!is_array($inner)) {
            $inner = [$inner];
        }
        $className = __NAMESPACE__ . '\\Tags\\' . ucfirst($tag);
        if (class_exists($className)) {
            return new $className($attributes, $inner);
        }
        return new Div($attributes, $inner);
    }


}