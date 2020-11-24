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
            define('DB_CONNECTION', trim($envLine[1]));   
        }
        if ($envLine[0] == "DB_HOST")
        {
            define('DB_HOST', trim($envLine[1]));  
        }
        if ($envLine[0] == "DB_PORT")
        {
            define('DB_PORT', trim($envLine[1]));  
        }
        if ($envLine[0] == "DB_DATABASE")
        {
            define('DB_DATABASE', trim($envLine[1]));
        }
        if ($envLine[0] == "DB_USERNAME")
        {
            define('DB_USERNAME', trim($envLine[1]));
        }
        if ($envLine[0] == "DB_PASSWORD")
        {
            define('DB_PASSWORD', trim($envLine[1]));
        }
    }
    if (!feof($handle)) {
        echo "Erreur: .env\n";
    }
    fclose($handle);
}