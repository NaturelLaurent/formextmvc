<?php

namespace App\Service;
use App\config\AccessConfig;
use PDO;

class SqlService
{
    private $connection;
    private static $instance;

    private function __construct()
    {
        $this->connection = new PDO('mysql:host='.SERVERNAME.';dbname='.DBNAME.';charset=utf8', LOGIN, PASSWORD,
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