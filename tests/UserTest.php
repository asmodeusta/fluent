<?php

namespace Tests;

use Fluent\User;
use Fluent\UserFluent;
use Fluent\UserSimple;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testUserSimple()
    {
        $user = new UserSimple();
        $user->id = 1;
        $user->name = 'John';
        $user->password = '12345';

        $this->assertEquals(
            ['id' => 1, 'name' => 'John', 'password' => '*****'],
            $user->getData()
        );
    }

    public function testUser()
    {
        $user = new User();
        $user->setId(2);
        $user->setName('Jack');
        $user->setPassword('123qwerty456');

        $this->assertEquals(
            ['id' => 2, 'name' => 'Jack', 'password' => '************'],
            $user->getData()
        );
    }

    public function testUserFluent()
    {
        $user = new UserFluent();
        $user->setId(666)
             ->setName('H@ck3R')
             ->setPassword('y0U_sH@LL_N0t_p@55');

        $this->assertEquals(
            [
                'id' => 666,
                'name' => 'H@ck3R',
                'password' => '******************'
            ],
            $user->getData()
        );
    }

}