<?php
namespace App\Repository;

use App\Service\SqlService;
use PDO;

class UserRepository
{
    private $bddconnected;
    private $servername = "localhost";
    private $dbname = "mvcphp";
    private $login = "mvcphp";
    private $pass = "qnVkH2AuTRjxDlBi";

    public function __construct()
    {
        
         $this->bddconnected = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname.';charset=utf8', $this->login, $this->pass,
         [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            
    }

    public function findAll()
    {
        $this->bddconnected;
        $bdd = $this->bddconnected;
        $users = $bdd->prepare('SELECT * FROM user');
        $users->execute();

        return $users;
       
    }

}