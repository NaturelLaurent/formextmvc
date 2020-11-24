<?php
require (dirname(__DIR__).'/vendor/autoload.php');

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';


$route = [
    '/' => 'App\Controller\AccueilController@accueil',
    '/addPersonne' => 'App\Controller\AccueilController@addPerson',
    '/listPersonne' => 'App\Controller\AccueilController@listUser',
    '/userSup' => 'App\Controller\AccueilController@userSup',
    '/userModif' => 'App\Controller\AccueilController@userModif',
    '/addArticle' => 'App\Controller\AccueilController@addArticle'
    
];

if (!empty($route[$pathInfo])) {

    $classMethod = explode('@', $route[$pathInfo]);

    $objController = new $classMethod[0];
   
   
    
    call_user_func([$objController, $classMethod[1]], $_REQUEST);
} else {
    echo 'essaye encore';  
}
