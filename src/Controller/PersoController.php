<?php

namespace App\Controller;

use App\Repository\PersoRepository;


class PersoController extends AbstractController
{
    public function getPersoList(){

        $rep = new PersoRepository;
        $persos = $rep->data_format($rep->findAll());

        //return $this->json($persos, 200);

    }

    public function getUser($id){
        var_dump("ok".$id);
        // $rep = new PersoRepository;
        // $req = $rep->find($id);

        // foreach ($req as $req){
        //     $perso = [
        //         "id" => $req['id'],
        //         "name" => $req['name'],
        //         "age" => $req['age'],
        //         "email" => $req['email']
        //     ];
        // } 
        // return $this->json($perso, 200);
    }

}