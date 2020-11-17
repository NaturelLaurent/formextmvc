<?php
namespace Src\Controllers;
// require (dirname(__DIR__).'/Model/UserManager.php');

class AccueilController
{
    // private $user;

    // public function __construct()
    // {
    //     $this->user = new UserManager();
    // }

    public function show()
    {
        // $user = $this->user->getInfo();

        // Affiche la vue accueilView.php
        require (dirname(__DIR__).'/templates/accueilView.php');
    }

    public function profile()
    {
        // $user = $this->user->getInfo();

        // Affiche la vue accueilView.php
        require (dirname(__DIR__).'/templates/profileView.php');
    }

    public function articles()
    {
        // $user = $this->user->getInfo();

        // Affiche la vue accueilView.php
        require (dirname(__DIR__).'/templates/articlesView.php');
    }
}