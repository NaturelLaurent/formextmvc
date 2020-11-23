<?php

namespace App\Service;

use PDO;
use PDOException;

class SqlService
{   protected $dsn = 'mysql:dbname=formation_php;host=127.0.0.1';
    protected $userName = 'root';  
    private $connection;
    private static $instance;

    private function __construct()
    {
        try {
            
            $this->connection = new PDO($this->dsn,$this->userName,'',
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

    public function insert(array $arrayOject, string $table){

        foreach ($arrayOject as $key => $value) {
          
        }
        $request = 'INSERT INTO'.$table;

      var_dump($table);
      //  $this->connection->prepare();
        

    }

    
}