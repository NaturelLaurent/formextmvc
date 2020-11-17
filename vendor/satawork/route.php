<?php
namespace Satawork\Route;

class Route 
{
    public static function get($segment, $view) {

      
        $method = $view[1];
        
        // echo ;
        // echo '</br>';
        // echo '/'. basename($_SERVER['REDIRECT_URL']);

       


        if($_SERVER['REDIRECT_URL'] == null && $segment == '/')
        {
            $controller = new $view[0];
            $controller->$method();
        }
        elseif($_SERVER['REDIRECT_URL'] != null && $segment == '/'. basename($_SERVER['REDIRECT_URL']))
        {

            if(substr_count($segment,'/') >= 2)
            {
                echo $_SERVER['REDIRECT_URL'];
            } 
            else 
            {
                $controller = new $view[0];
                $controller->$method();
            }
    
            // echo ;
            // echo basename($_SERVER['REDIRECT_URL']);
            // print_r($_SERVER);
            
        }
        // else 
        // {
        //    exit('404');
        // }


        
   
        // echo basename($_SERVER['REDIRECT_URL']);
        
        // print_r($_SERVER);

        

    }

  
  
}