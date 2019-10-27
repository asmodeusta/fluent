<?php

namespace Tests;

use Fluent\QueryBuilder;
use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{

    public function testQueryBuilder()
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select(
            ['u.id', 'u.name'])
            ->from('users', 'u')
            ->where('u.id = 2');
        $this->assertEquals(
            'SELECT u.id, u.name FROM users AS u WHERE u.id = 2',
            strval($queryBuilder)
        );
    }

}