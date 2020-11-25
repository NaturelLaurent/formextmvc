<?php

use App\Service\traitementUrl;

require(dirname(__DIR__) . '/vendor/autoload.php');


$pathInfo = $_SERVER['PATH_INFO'] ?? '/';




$route = [

    'addPersonne' => 'App\Controller\AccueilController@addPerson',
    'listPersonne' => 'App\Controller\AccueilController@listUser',
    'userSup/id' => 'App\Controller\AccueilController@userSup',
    'userModif/id' => 'App\Controller\AccueilController@userModif',
    //  'addArticle' => 'App\Controller\AccueilController@addArticle',
    'utilisateur/id' => 'App\Controller\AccueilController@getUtilisateur'

];
$urlTab = explode('/', $pathInfo);
$is_id = false;
$param = array();
$id = null;

if (count($urlTab) >= 3) {
    $id = '/id';
    $is_id = true;
}
var_dump($_POST);
if (!empty($route[$urlTab[1] . $id])) {

    $classMethod = explode('@', $route[$urlTab[1] . $id]);

    $objController = new $classMethod[0];
    $traitementUrl = new TraitementUrl();
    if ($_SERVER['REQUEST_METHOD'] == 'GET'  || $_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $param = $traitementUrl->getAndDelete($urlTab);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($_POST as $key => $value) {
            $param[$key] = $value;
        }
        if ($is_id) {
            $tempParam = $traitementUrl->getAndDelete($urlTab);
            foreach ($tempParam  as $key => $value) {
                $param[$key] = $value;
            }
        }
        $param['status'] = true;
    }


    if ($param['status']) {

        call_user_func([$objController, $classMethod[1]], $param);
    } else {
        echo 'l\'identifiant doit etre numérique';
    }
} else {
    echo 'essaye encore';
}
