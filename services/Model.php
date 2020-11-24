<?php
namespace App;

class Model {
    
    public static function all()
    {
        $table = strtolower(end(explode('\\',  get_called_class())) . 's');
        return new Tools('all', $table); 
    }

    public static function where()
    {
        $table = strtolower(end(explode('\\',  get_called_class())) . 's');
        return new Tools('where', $table); 
    }

    public static function find($value)
    {
        $table = strtolower(end(explode('\\',  get_called_class())) . 's');
        return new Tools('find', $table, $value); 
    }

}