<?php
namespace App;

class Route 
{
    public static function get($segment, $view) {

        $server = $GLOBALS['varGlobal'];
        $method = $view[1];

        $EXsegment  = explode('/', $segment);
        $EXurl      = explode('/', $server['REDIRECT_URL']);
        $value      = null;

        for ($i = 0; $i < count($EXsegment); $i++) {
            if($EXsegment[$i][0] == '{')
            {
                $EXsegment[$i]  = $EXurl[$i];
                $value          = $EXurl[$i];
            }
        }

        $segment = implode("/", $EXsegment);

        if($server['REDIRECT_URL'] == null && $segment == '/')
        {
 
            $controller = new $view[0];     
            return $controller->$method();
  
        }
        elseif($server['REDIRECT_URL'] != null && $segment == $server['REDIRECT_URL'])
        {
            $controller = new $view[0];
            return ($value) ? $controller->$method($value) : $controller->$method();        
                  
        }
    }
}