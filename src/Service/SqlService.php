<?php

namespace App\Service;

use Exception;
use PDO;
use PDOException;

class SqlService
{
    protected $dsn = 'mysql:dbname=formation_php;host=127.0.0.1';
    protected $userName = 'root';
    private $connection;
    private static $instance;

    private function __construct()
    {
        try {

            $this->connection = new PDO(
                $this->dsn,
                $this->userName,
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            echo 'Echec de la connexion : ' . $e->getMessage();
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

    public function insert(array $arrayOject, string $table)
    {
        $champ = '(';
        $varValeur = '(';
        $last_key = array_key_last($arrayOject);
        $param = array();

        foreach ($arrayOject as $key => $value) {
            if ($key == $last_key) {
                $champ .= $key . ')';
                $varValeur .= ':' . $key . ');';
            } else {
                $champ .= $key . ',';
                $varValeur .= ':' . $key . ',';
            }
            $param[$key] = $value;
        }

        $request = "INSERT INTO " . $table . " " . $champ . " VALUES " . $varValeur;


        try {
            $pre =  $this->connection->prepare($request);

            $pre->execute($param);
            
        } catch (PDOException $e) {
            echo 'Error  ' . $e->getMessage();
        }
    }

    public function fetch($nameTable)
    {
        $request = "SELECT * FROM " . $nameTable;
        $users = $this->connection->query($request)->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    
    public function remove(string $nameTable, int $id)
    {  
       $users =  SqlService::getInstance()->fetch($nameTable);
        $userCourant = null;
        foreach ($users as $user) {
          if ($user->id == $id) {
            $userCourant = $user;
          }
        }
        if ($userCourant == null) {
         echo 'Cet utilisateur n\'existe pas, impossible de le supprimer !!!!';
         die();
        }
      

        $request = "DELETE FROM  " . $nameTable . " WHERE id= :id";


        try {
            $pre = $this->connection->prepare($request);
            $param = array('id' => $id);
            $pre->execute($param);
        } catch (PDOException $e) {
            echo 'Error :' . $e->getMessage();
        }
    }

    public function update(array $arrayOject, string $nameTable, int $id)
    {

        $varValeur = '';
        $last_key = array_key_last($arrayOject);
        $param = array();

        foreach ($arrayOject as $key => $value) {
            if ($key == $last_key) {

                $varValeur .= $key . '=' . ':' . $key . ' ';
            } else {

                $varValeur .= $key . '=' . ':' . $key . ' ,';
            }
            $param[$key] = $value;
        }
        $param['id'] = $id;
        $request = "UPDATE " . $nameTable . " SET " . $varValeur . ' WHERE id=:id';

        try {
            $pre =  $this->connection->prepare($request);

            $pre->execute($param);
        } catch (PDOException $e) {
            echo 'Error  ' . $e->getMessage();
        }
    }
}
