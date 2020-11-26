<?php

require dirname(__DIR__).'/vendor/autoload.php';

$uri = ($_SERVER['REQUEST_URI']);
$router = new App\config\Router($uri);

$routing = $router->chekerUrl();
if($routing[3] === 'POST'){
    $router->post($routing[0], $routing[1].'@'.$routing[2], null, $routing[3]);

}else{
    $router->get($routing[0], $routing[1].'@'.$routing[2], null, $routing[3]);
}


$router->run();





//$router->get('/articles', function(){ echo 'Tous les articles';});

// $router->get('/article/:id', function($id){ echo 'Voir l\'article'.$id;});

// $router->post('/article/:id', function($id){ echo 'poster l\'article'.$id;});


