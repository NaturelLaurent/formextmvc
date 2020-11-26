<?php
require dirname(__DIR__).'/config/db.php';
require dirname(__DIR__).'/vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$methode = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$routes = [
    '/perso' => [
        'GET' => 'App\Controller\PersoController@findAll',
        'POST' => 'App\Controller\PersoController@add'
    ],
    '/perso/{\d}/' => [
        'GET' => 'App\Controller\PersoController@find',
        'POST' => 'App\Controller\PersoController@edit'
    ]
    // ,
    // '/perso/{\d}/article' => [
    //     'GET' => 'App\Controller\PersoController@findto',
    //     'POST' => 'App\Controller\PersoController@addto'
    // ]
];

////////// TODO: prendre en compte l'id dans la route

try {
    $routeInfo = $routes[$pathInfo];
    if(isset($routeInfo)){
        $classMethode = explode('@', $routeInfo[$methode]);
        $classMethode[0] = new $classMethode[0];
        call_user_func($classMethode, $_REQUEST);
        die;
    }
}
catch(Exception $e){
    echo $e->getMessage();
}

