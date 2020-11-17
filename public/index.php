<?php

spl_autoload_register(function ($class) {

    include '../vendor/satawork/route.php';
    include '../src/Controller/AccueilController.php';
    include '../src/Model/UserManager.php';

});


require dirname(__DIR__) . '/routes/web.php';



