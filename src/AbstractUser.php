<?php

namespace Fluent;

abstract class AbstractUser implements UserInterface
{

    protected $id;
    protected $name;
    protected $password;

    public function getData() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'password' => str_repeat('*', strlen($this->password)),
        ];
    }

}