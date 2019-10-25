<?php

namespace Fluent;

class User extends AbstractUser
{

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function setPassword(string $password) : void
    {
        if ($this->validatePassword($password)) {
            $this->password = $password;
        }
    }

    protected function validatePassword($password)
    {
        return (strlen($password) >= 3) && (strlen($password) <= 32);
    }

}