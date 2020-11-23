<?php
$class = $_GET['controller'];
$method = $_GET['action'];

if(file_exists($class . '.php')) {
    require_once $class . '.php';

    $obj = new $class;

    $obj->$method();
}

echo 'Le fichier n\'existe pas ';