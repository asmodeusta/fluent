<?php

namespace Fluent;

class UserFluent extends AbstractUser
{

    protected $id;
    protected $name;
    protected $password;

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;
        return $this;
    }

    public function setPassword(string $password) : self
    {
        if ($this->validatePassword($password)) {
            $this->password = $password;
        }
        return $this;
    }

    protected function validatePassword($password)
    {
        return (strlen($password) >= 3) && (strlen($password) <= 32);
    }

}