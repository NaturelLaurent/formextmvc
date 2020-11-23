<?php

require dirname(__DIR__) . '/services/Config.php';
require dirname(__DIR__) . '/services/Connect.php';
require dirname(__DIR__) . '/routes/Web.php';


function View($view, array ...$datas) {
          
    foreach ($datas[0] as $key => $value)
    {
        $$key = $value;
    }

   
    $cssMain        =   (dirname(__DIR__).'/public/main.css');
    $cssTaillwind   =   (dirname(__DIR__).'/public/taillwind.css');

    $body           =   (dirname(__DIR__).'/src/Templates/' . $view . '.view.php');

    require (dirname(__DIR__).'/src/Templates/layout/layout.view.php');
}  








