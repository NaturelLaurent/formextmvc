<?php
$class = $_GET['controller'];
$method = $_GET['action'];


$class = $class?? 'AccueilController';

var_dump(dirname(__DIR__));
if( file_exists(dirname(__DIR__).'/src/Controller'.$class . '.php')) {

    require_once (dirname(__DIR__).'/src/Controller/'.$class . '.php');

    $obj = new $class;

   $method = $method ?? 'show';

    $obj->$method();
}else{
    
echo 'Le fichier n\'existe ';

}
