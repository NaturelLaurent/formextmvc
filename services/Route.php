<?php
namespace App;

class Route 
{
    public static function get($segment, $view) {
       
        $server = $GLOBALS['varGlobal'];
        $method = $view[1];

        if($server['REDIRECT_URL'] == null && $segment == '/')
        {
 
            $controller = new $view[0];     
            $controller->$method();
  
        }
        elseif($server['REDIRECT_URL'] != null && $segment == '/'. basename($server['REDIRECT_URL']))
        {

            if(substr_count($segment,'/') >= 2)
            {

                echo $server['REDIRECT_URL'];
                
            } 
            else 
            {
                
                $controller = new $view[0];
                $controller->$method();
            
            }          
        }
    }
}