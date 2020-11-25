<?php

require dirname(__DIR__) . '/services/Config.php';
require dirname(__DIR__) . '/routes/web.php';
require dirname(__DIR__) . '/routes/api.php';


function View($view, array ...$datas) {
          
    Extract($datas[0]);

    $cssMain        =   (dirname(__DIR__).'/public/main.css');
    $cssTaillwind   =   (dirname(__DIR__).'/public/taillwind.css');

    $body           =   (dirname(__DIR__).'/src/Templates/' . $view . '.view.php');

    require (dirname(__DIR__).'/src/Templates/layout/layout.view.php');
}

function Redirect($redirect) {
    
    return header('Location: /' . $redirect);
    
}

function Url($name) {
    
    return $name;

}  








