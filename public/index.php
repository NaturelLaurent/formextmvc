<?php



require(dirname(__DIR__) . '/vendor/autoload.php');

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

$route = [
    '/person' => [
        'GET' => 'App\Controller\AccueilController@listUser',
        'POST' => 'App\Controller\AccueilController@addPerson',
    ],
    '/person/id' => [
        'GET' => 'App\Controller\AccueilController@getUtilisateur',
        'POST' => 'App\Controller\AccueilController@userModif',
        'DELETE' => 'App\Controller\AccueilController@userSup',
    ],

];

$pthTab = explode('/', $pathInfo);

$param = array();

for ($i = 0; $i < count($pthTab); $i++) {
    if (is_numeric($pthTab[$i])) {
        $param['id'] = $pthTab[$i];
        $pthTab[$i] = 'id';
    }
}

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $param[$key] = $value;
    }
}

$pathInfo = implode('/', $pthTab);



if (!empty($route[$pathInfo][$_SERVER['REQUEST_METHOD']])) {

    $classMethod = explode('@', $route[$pathInfo][$_SERVER['REQUEST_METHOD']]);

    $objController = new $classMethod[0];


    call_user_func([$objController, $classMethod[1]], $param);
} else {
    echo 'essaye encore';
}
