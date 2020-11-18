<?php

namespace App\Service;

use PDO;

class SqlService
{
    private $connection;
    private static $instance;

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=NomServeur;dbname=NomDeLaBase;charset=utf8', $login, $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public static function getInstance(): SqlService
    {
        if (!SqlService::$instance) {
            SqlService::$instance = new SqlService();
        }

        return SqlService::$instance;
    }
}