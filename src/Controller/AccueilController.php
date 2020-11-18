<?php

namespace App\Controller;

use app\Entity\User;
use App\Model\UserManager;

class AccueilController
{
    private $user;

    public function __construct()
    {
        $this->user = new UserManager();
    }

    public function show()
    {
        $user = $this->user->getInfo();

        require (dirname(__DIR__).'/templates/accueilView.php');
    }

    public function showPerson()
    {
        $user = $this->user->getInfo();

        require (dirname(__DIR__).'/templates/personnageView.php');
    }

    public function modif()
    {
      
        require (dirname(__DIR__).'/templates/modifPersonView.php');
    }

    public function contact()
    {
        $user = $this->user->getInfo();
        require (dirname(__DIR__).'/templates/contactView.php');
    }



    
}