<?php


spl_autoload_register(function ($class) {

    $dirTab = explode("\\", $class);
    $dirTab = str_replace("App", "src", $dirTab);
    $dir = implode('/', $dirTab) . '.php';

    require dirname(__DIR__) . '/' . $dir;
});

$pathInfo = $_SERVER['REQUEST_URI'] ?? '/';


$route = [
    '/' => 'App\Controller\AccueilController@show',
    '/personnage' => 'App\Controller\AccueilController@showPerson',
    '/modifierPersonnage' => 'App\Controller\AccueilController@modif',
    '/contact' => 'App\Controller\AccueilController@contact',
    '/page' => 'App\Controller\PageController@show'
];

if (!empty($route[$pathInfo])) {

    $classMethod = explode('@', $route[$pathInfo]);

    $objController = new $classMethod[0];

    call_user_func([$objController, $classMethod[1]], $_REQUEST);
} else {
    echo 'essaye encore';
}
