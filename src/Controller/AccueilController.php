<?php

namespace App\Controller;

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
}