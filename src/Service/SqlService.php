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
        $this->connection = new PDO(
            'mysql:host=' . $this->servername . ';dbname=' . $this->dbname . ';charset=utf8',
            $this->login,
            $this->pass,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function getInstance(): SqlService
    {
        if (!SqlService::$instance) {
            SqlService::$instance = new SqlService();
        }

        return SqlService::$instance;
    }
    public function query(string $sql, array $param = [], $limit = 0)
    {
        if ($limit) {
            $sql .= ' limit ' . (int)$limit;
        }

        $prep = $this->connection->prepare($sql);
        $prep->execute($param);

        return $prep;
    }

    public function lastInsertId(): int
    {
        return $this->connection->lastInsertId();
    }

    public function fetch(string $sql, array $param = [], $limit = 0): ?array
    {
        $rez = $this->query($sql, $param, $limit)->fetch(PDO::FETCH_ASSOC);
        return $rez ?: null;
    }

    public function fetchAll(string $sql, array $param = [], $limit = 0): array
    {
        return $this->query($sql, $param, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }
}
