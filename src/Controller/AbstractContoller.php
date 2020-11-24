<?php

namespace App\Controller;


class AbstractContoller
{

    public function render(string $_nomTPL, array $param = null )
    {
        if ($param != null) {
           
            extract($param, EXTR_SKIP);
        }

        require(dirname(__DIR__).'/templates/'.$_nomTPL.'.php');

  
    }

    public function redirectTo(string $url, int $statusCode = 303 )
    {
       
        header('Location: '.$url, true, $statusCode);
        
       

  
    }
}