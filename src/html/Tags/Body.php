<?php

namespace HtmlBuilder\Tags;

use HtmlBuilder\AbstractTag;

class Body extends AbstractTag
{

    protected function getTagName(): string
    {
        return 'body';
    }


}