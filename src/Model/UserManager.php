<?php

require (dirname(__DIR__).'/Entity/User.php');

class UserManager
{
    private array $info;

    public function __construct()
    {
        $this->info = [
            'nom' => 'Laurent',
            'login' => 'laurent@free.fr'
        ];
    }

    public function getInfo() : User
    {
        $user = new User();
        $user->setLogin($this->info['login'])->setPrenom($this->info['nom']);

        return $user;
    }
}
