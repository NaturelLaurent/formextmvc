<?php
require (dirname(__DIR__).'/Entity/User.php');
class UserManager
{
    private array $info;

    public function __construct()
    {
        $this->info = [
            'login' => 'josex@gmail.com',
            'nom'   =>  'Lefion'
        ];
    }

    public function getInfo() : User
    {
        $user = new User();
        $user->setLogin($this->info['login'])->setName($this->info['nom']);

        return $user;
    }

}