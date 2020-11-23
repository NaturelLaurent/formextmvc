<?php
require (dirname(__DIR__).'/vendor/autoload.php');

$pathInfo = $_SERVER['REQUEST_URI'] ?? '/';


$route = [
    '/' => 'App\Controller\AccueilController@addPerson',
    '/addPersonne' => 'App\Controller\AccueilController@addPerson',
    '/modifierPersonnage' => 'App\Controller\AccueilController@modif',
    '/contact' => 'App\Controller\AccueilController@contact',
    '/page' => 'App\Controller\PageController@addPerson'
];

if (!empty($route[$pathInfo])) {

    $classMethod = explode('@', $route[$pathInfo]);

    $objController = new $classMethod[0];
   
    
    call_user_func([$objController, $classMethod[1]], $_REQUEST);
} else {
    echo 'essaye encore';  
}
