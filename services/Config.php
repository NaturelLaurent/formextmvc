<?php

// SERVER
$varGlobal  =   $_SERVER;

// DB_CONNECT
$handle = @fopen("../.env", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
 
        $envLine = explode("=", $buffer);

        if ($envLine[0] == "DB_CONNECTION")
        {
            $dbConnection = trim($envLine[1]);
        }
        if ($envLine[0] == "DB_HOST")
        {
            $dbHost = trim($envLine[1]);
        }
        if ($envLine[0] == "DB_PORT")
        {
            $dbPort = trim($envLine[1]);
        }
        if ($envLine[0] == "DB_DATABASE")
        {
            $dbDatabase = trim($envLine[1]);
        }
        if ($envLine[0] == "DB_USERNAME")
        {
            $dbUser = trim($envLine[1]);
        }
        if ($envLine[0] == "DB_PASSWORD")
        {
            $dbPassword = trim($envLine[1]);
        }
    }
    if (!feof($handle)) {
        echo "Erreur: .env\n";
    }
    fclose($handle);
}