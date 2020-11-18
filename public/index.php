<?php

spl_autoload_register(function ($class){
    $class= str_replace('App', 'src', $class );
    $class= str_replace('/', '\\', $class);
    //include(__DIR__."\\".$class.'.php') ;
    require (dirname(__DIR__)."\\".$class.".php");
});

$route = [
    '/' => 'App\Controller\AccueilController@index',
    '/personnage' => 'App\Controller\PersonnageController@index',
    '/personnage/edit' => 'App\Controller\PersonnageController@edit',
    '/contact' => 'App\Controller\ContactController@index'
];

$url = $_SERVER['REQUEST_URI'];


if(!empty($route[$url])){
    $classMethode = explode('@', $route[$url]);

    $obj = new $classMethode[0];

    $classMethode[0] = $obj;
    call_user_func($classMethode, $_REQUEST);

    die();
    
}else{
    echo 'pas ok';
}

