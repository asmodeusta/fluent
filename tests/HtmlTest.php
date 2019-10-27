<?php

namespace Tests;

use HtmlBuilder\Builder;
use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{

    public function testHtml()
    {
        $builder = new Builder();
        $html = $builder->create('html', [
            $builder->create('head', [
                $builder->create('title', 'Test page')
            ]),
            $builder->create('body', [
                'Test'
            ]),
        ]);
        $this->assertEquals('<html><head><title>Test page</title></head><body>Test</body></html>', (string) $html);
    }

}