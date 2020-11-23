<?php
namespace App;

use PDO;
use PDOException;

class Connect
{
    public static function database()
    {
        try {
            $db = new PDO(  $GLOBALS['dbConnection'] .':host='. 
                            $GLOBALS['dbHost'] . ':' . 
                            $GLOBALS['dbPort'] .';dbname=' . 
                            $GLOBALS['dbDatabase'], 
                            $GLOBALS['dbUser'], 
                            $GLOBALS['dbPassword']
                        );
           
            return $db;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
}

