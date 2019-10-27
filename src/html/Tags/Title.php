<?php

namespace HtmlBuilder\Tags;

use HtmlBuilder\AbstractTag;

class Title extends AbstractTag
{
    protected function getTagName(): string
    {
        return 'title';
    }


}