<?php

use App\Service\MyString;
use App\Service\Calc;

require (dirname(__DIR__).'/Model/UserManager.php');

class ContactController
{
    private $user;

    public function __construct()
    {
//        $this->user = new UserManager();
    }

    public function show()
    {

        $nombre = $_GET['nombre'];
        $calc = new Calc($nombre);

//        $user = $this->user->getInfo();

        echo 'Le cube est : '. $calc->cube();
//        echo 'Le carré est : '. ($nombre*$nombre);


        // Affiche la vue accueilView.php
    }
}