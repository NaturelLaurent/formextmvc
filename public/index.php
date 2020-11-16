<?php
$class  = ucwords($_GET['controller']. 'Controller'); 
$method = $_GET['action'];
$file   = dirname(__DIR__) . '/src/Controller/' . $class .'.php';
// echo $class;

if(file_exists($file)) {

    require dirname(__DIR__) . '/src/Controller/' . $class .'.php';

    $obj = new $class;

    if(method_exists($obj, $method))
    {
        $obj->$method();
    }else {
        echo 'method pas bonne';
    }

} else {
    echo 'Le fichier n\'existe pas';
}
