<?php
namespace App;

class RouteRegistrar
{
    private $api;

    public function __construct($api){ 
        // $api = false;
        $this->api       =   $api;
	}
    
    public function get($segment, $view) {

        
        $server = $GLOBALS['varGlobal'];
        (!$this->api) ? $method = $view[1] : null ;

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
            if($this->api)
            {
                header('Content-Type: application/json');
                echo json_encode($view(), JSON_PRETTY_PRINT);
            } 
            else
            {
                $controller = new $view[0];
                return ($value) ? $controller->$method($value) : $controller->$method();        
            }
            
                    
        }
       
    }

}