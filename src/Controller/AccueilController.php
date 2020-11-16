<?php

require (dirname(__DIR__).'/Model/UserManager.php');

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
        // Affiche la vue accueilView.php
    }
}