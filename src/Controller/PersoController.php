<?php

namespace App\Controller;

use App\Entity\Perso;
use App\Service\SqlService;
use PDO;

class PersoController extends AbstractController
{
    public function findAll(){
////////////TODO a metre dans un repository//////////
        $pdo = SqlService::getInstance();
        $req = $pdo->fetchAll('SELECT * FROM perso');
///////////////////////////////////////////////////////
        $persos = [];
        foreach ($req as $req){
            $perso = new Perso;
            $perso
                ->setId($req['id'])
                ->setName($req['name'])
                ->setAge($req['age'])
                ->setEmail($req['email']);
            
            array_push($persos, $perso);
        }
///////////////TODO : comprendre pour quoi les tab d'objets json sont vide 
        return $this->json($persos, 200);

    }

}