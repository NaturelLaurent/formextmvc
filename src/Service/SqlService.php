<?php

namespace App\Service;

use PDO;
use PDOException;

class SqlService
{   const HOST = 'localhost';
    const USER_NAME = 'root';
    const DB_NAME = 'formation_php';
    private $connection;
    private static $instance;

    private function __construct()
    {
        try {
            
            $this->connection = new PDO('mysql:host='.$this->HOST.';dbname='.$this->DB_NAME.';charset=utf8', $this->USER_NAME,
             array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
        } catch (PDOException $e) {
          echo 'Echec de la connexion : '.$e->getMessage();
        }
    }

    public static function getInstance(): SqlService
    {
        if (!SqlService::$instance) {
            SqlService::$instance = new SqlService();
        }

        return SqlService::$instance;
    }

    /**
     * Get the value of connection
     */ 
    public function getConnection()
    {
        return $this->connection;
    }

    public function insert(string $requet){

        $this->connection->query($requet);
        

    }

    
}