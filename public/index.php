<?php
<<<<<<< HEAD

if (!empty($_GET['controller'])) {

    $class = ucwords($_GET['controller']) . 'Controller';

} else {

    $class = 'AccueilController';
}

$method = $_GET['action'] ?? 'show';

if(file_exists(dirname(__DIR__) . '/src/Controller/' . $class . '.php')) {
    require_once dirname(__DIR__) . '/src/Controller/' . $class . '.php';

    $obj = new $class;

    if(method_exists($obj, $method)) {
        $obj->$method();

        die();
    }
}
=======
$class = $_GET['controller'];
$method = $_GET['action'];

if(file_exists($class . '.php')) {
    require_once $class . '.php';

    $obj = new $class;

    $obj->$method();
}

>>>>>>> 628394a548c960284c2b72f1e568206994d0a525
echo 'Le fichier n\'existe pas';