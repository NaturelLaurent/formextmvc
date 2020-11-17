<?php
namespace App\Controller;

class AccueilController
{
    public function __construct()
    {
       
    }

    public function index()
    {
    
       
        require (dirname(__DIR__).'/templates/accueilView.php');
        // Affiche la vue accueilView.php
    }
}