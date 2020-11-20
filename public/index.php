<?php

require dirname(__DIR__).'/vendor/autoload.php';

$uri = ($_SERVER['REQUEST_URI']);
$router = new App\config\Router($uri);

// $router->get('/', "Accueil@index");

// $router->get('/articles', function(){ echo 'Tous les articles';});

// $router->get('/article/:id', function($id){ echo 'Voir l\'article'.$id;});

// $router->post('/article/:id', function($id){ echo 'poster l\'article'.$id;});
$router->chekerUrl();
$router->run();

