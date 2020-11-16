<?php
if(!empty($_GET['controller'])){
    $class = $_GET['controller'] . 'Controller';
}else{
    $class = 'AccueilController';
}
$method = $_GET['action'] ?? 'show';

if(file_exists(dirname(__DIR__). '/src/Controller/' . $class . '.php')) {
    require dirname(__DIR__). '/src/Controller/' . $class . '.php';

    $obj = new $class;

    if(method_exists($obj, $method)){
        $obj->$method();
        die();
    }
    
}
    echo 'Le fichier n\'existe pas';

