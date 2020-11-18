<?php

namespace App\Controller;
use App\Model\UserManager;

//require (dirname(__DIR__).'/Model/UserManager.php');

class PersonnageController
{
    private $user;

    public function __construct()
    {
        $this->user = new UserManager();
    }

    public function index()
    {
        $user = $this->user->getInfo();
       
        require (dirname(__DIR__).'/templates/personnageView.php');
    }
    public function edit(){

        $prenom = $email = "";

        $user = $this->user->getInfo();
        
         if($_SERVER["REQUEST_METHOD"] == "POST"){
             if(!empty($_POST["prenom"])){
                $prenom = $_POST["prenom"];  
             }
             if(!empty($_POST["email"])){
                $email = $_POST["email"];
             }
             $user->setPrenom($prenom)->setEmail($email);
         }

        require(dirname(__DIR__).'/templates/personnageEdit.php');
    }
}