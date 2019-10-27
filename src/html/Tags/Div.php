<?php

namespace HtmlBuilder\Tags;

use HtmlBuilder\AbstractTag;

class Div extends AbstractTag
{

    protected function getTagName(): string
    {
        return 'div';
    }


}