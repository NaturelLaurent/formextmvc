<?php

namespace App\config;

class AccessConfig
{
    public function bddlogin()
    {
        define('SERVERNAME', "localhost");
        define('DBNAME', 'mvcphp');
        define('LOGIN', 'mvcphp');
        define('PASSWORD', 'qnVkH2AuTRjxDlBi');

        return AccessConfig::class;
    }
}