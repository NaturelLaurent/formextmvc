<?php
namespace App\Model;

use App\Entity\User;

//require (dirname(__DIR__).'/Entity/User.php');

class UserManager
{
    private array $info;

    public function __construct()
    {
        $this->info = [
            'prenom' => 'maxime',
            'email' => 'contact@maximepierre.fr'
        ];
    }

   public function getInfo() : User
    {
        $user = new User();
        $user->setPrenom($this->info['prenom'])->setEmail($this->info['email']);

        return $user;
    }
}