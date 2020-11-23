<?php

class UserManager
<<<<<<< HEAD

=======
>>>>>>> 628394a548c960284c2b72f1e568206994d0a525
{
    private array $info;

    public function __construct()
    {
        $this->info = [
<<<<<<< HEAD
            'login'=>'root',
            'nom' =>'root'
=======
>>>>>>> 628394a548c960284c2b72f1e568206994d0a525
        ];
    }

    public function getInfo() : User
    {
        $user = new User();
        $user->setLogin($this->info['login'])->setPrenom($this->info['nom']);

        return $user;
    }
}