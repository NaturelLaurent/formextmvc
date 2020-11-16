<?php
  require (dirname(__DIR__).'/Entity/User.php');
class UserManager
{
    private array $info;

  


    public function __construct()
    {
        $this->info = [ 'nom'=>'adil',
                        'login'=>'adil@hotmail.fr'
        ];
    }

    public function getInfo() : User
    {
        $user = new User();
        $user->setLogin($this->info['login'])->setNom($this->info['nom']);

        return $user;
    }
}