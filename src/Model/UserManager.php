<?php

class UserManager
{
    private array $info;

    public function __construct()
    {
        $this->info = [
        ];
    }

    public function getInfo() : User
    {
        $user = new User();
        $user->setLogin($this->info['login'])->setPrenom($this->info['nom']);

        return $user;
    }
}