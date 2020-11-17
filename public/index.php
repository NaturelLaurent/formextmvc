<?php


spl_autoload_register(function($class){ 
   
  


});

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';


$route =[
    '/'=> 'App\Controller\AccueilController@show',
    '/page'=> 'App\Controller\PageController@show'
];

if (!empty($route[$pathInfo])) {
  
    $classMethod = explode('@',$route[$pathInfo]);
  
        $objController = new $classMethod[0];       

    call_user_func([ $objController, $classMethod[1]], $_REQUEST);

  
}else {
    echo 'essaye encore';
}

