<?php

namespace HtmlBuilder\Tags;

use HtmlBuilder\AbstractTag;

class Html extends AbstractTag
{

    protected function getTagName() : string
    {
        return 'html';
    }

}