<?php
require dirname(__DIR__).'/config/db.php';
require dirname(__DIR__).'/vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$methode = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$routes = [
    '/perso' => [
        'GET' => 'App\Controller\PersoController@getPersoList',
        'POST' => 'App\Controller\PersoController@add'
    ],
    '/perso/{\d}/' => [
        'GET' => 'App\Controller\PersoController@getPerso',
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
    if(isset($pathInfo)){
        $route_param = explode('/', $pathInfo);
        var_dump("/".$route_param[1]);
        if($routes["/".$route_param[1]."/"]){
            var_dump("ok");
        }
    }
    $routeInfo = $routes[$pathInfo];
    if(isset($routeInfo)){
        $classMethode = explode('@', $routeInfo[$methode]);
        $classMethode[0] = new $classMethode[0];
        var_dump($classMethode, $_REQUEST);
        call_user_func($classMethode, $_REQUEST);
        die;
    }
}
catch(Exception $e){
    echo $e->getMessage();
}

