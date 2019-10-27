<?php

namespace HtmlBuilder\Tags;

use HtmlBuilder\AbstractTag;

class Head extends AbstractTag
{

    protected function getTagName(): string
    {
        return 'head';
    }

}