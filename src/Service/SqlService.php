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
        $valeur = '(';
        $last_key = array_key_last($arrayOject);

        foreach ($arrayOject as $key => $value) {
            if ($key == $last_key) {
                $champ .= $key . ')';
                $valeur .= $value . ');';
            } else {
                $champ .= $key . ',';
                $valeur .= $value . ',';
            }
        }

        $request = "INSERT INTO " . $table . " " . $champ . " VALUES " . $valeur;
        var_dump($request);
        try {
            $this->connection->exec($request);
        } catch (PDOException $e) {
            echo 'Error  ' . $e->getMessage();
        }
    }
}
