<?php
require dirname(__DIR__).'/config/db.php';
require dirname(__DIR__).'/vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

$routes = [
    '/perso' => [
        'GET' => 'App\Controller\PersoController@findAll',
        'POST' => 'App\Controller\PersoController@add'
    ],
    '/perso/{\d}/' => [
        'GET' => 'App\Controller\PersoController@',
        'POST' => 'App\Controller\PersoController@'
    ],
    '/perso/{\d}/article' => [
        'GET' => 'App\Controller\PersoController@',
        'POST' => 'App\Controller\PersoController@'
    ]
];


