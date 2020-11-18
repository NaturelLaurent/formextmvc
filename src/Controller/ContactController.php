<?php

namespace App\Controller;

class ContactController
{
    public function index()
    {
        
        $to = "contact@maximepierre.fr";
        $email = $sujet = $content = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["email"])){
               $email = $_POST["email"];  
            }
            if(!empty($_POST["sujet"])){
               $sujet = $_POST["sujet"];
            }
            if(!empty($_POST["content"])){
                $content = $_POST["content"];
             }
             $header = "From: ".$email;
             mail($to,$sujet,$content,$header);
        }
       
        require (dirname(__DIR__).'/templates/contact.php');
    }
}