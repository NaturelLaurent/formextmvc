<?php
namespace App;

use PDO;
use PDOException;

class Connect
{


    public static function database()
    {
        try {
            $db = new PDO(  DB_CONNECTION .':host='. 
                            DB_HOST . ':' . 
                            DB_PORT .';dbname=' . 
                            DB_DATABASE, 
                            DB_USERNAME, 
                            DB_PASSWORD
                        );
           
            return $db;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
}

