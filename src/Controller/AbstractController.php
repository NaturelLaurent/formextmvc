<?php

namespace App\Controller;

use Exception;
use PDO;
use PDOException;

class AbstractController
{

    public function render(string $_nomTPL, array $param)
    {
        extract($param, EXTR_SKIP);

        require(dirname(__DIR__).'/templates/'.$_nomTPL.'.php');
    }
    // public function bddconnect()
    // {
    //     // TODO: remplacer les parametre de connexion brut par des paramatre tirer de src\config\access.json
    //     try
    //     {
    //         $bdd = new PDO('mysql:host=localhost;dbname=mvcphp;charset=utf8', 'mvcphp', 'qnVkH2AuTRjxDlBi');
    //     }
    //     catch (PDOException $e)
    //     {
    
    //         die('Erreur : '.$e->getMessage());
    //     }

    // }
}