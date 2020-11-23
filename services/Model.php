<?php
namespace App;

abstract class Model {
    
    public static function all()
    {
        $table = strtolower(end(explode('\\',  get_called_class())) . 's');
        return new Tools('all',  $table); 
    }

    public static function where()
    {
        $table = strtolower(end(explode('\\',  get_called_class())) . 's');
        return new Tools('where',  $table); 
    }

}