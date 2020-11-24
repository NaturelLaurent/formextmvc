<?php

namespace App\Service;
use App\config;
use PDO;

class SqlService
{
    private $connection;
    private static $instance;
    private $servername = "localhost";
    private $dbname = "mvcphp";
    private $login = "mvcphp";
    private $pass = "qnVkH2AuTRjxDlBi";

    private function __construct()
    {
        $this->connection = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname.';charset=utf8', $this->login, $this->pass,
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