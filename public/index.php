<?php
$class  = ucwords($_GET['controller']. 'Controller'); 
$method = $_GET['action'];
$file   = dirname(__DIR__) . '/src/Controller/' . $class .'.php';
// echo $class;

if(file_exists($file)) {

    require dirname(__DIR__) . '/src/Controller/' . $class .'.php';

    $obj = new $class;
    $obj->$method();


} else {
    echo 'Le fichier n\'existe pas';
}
