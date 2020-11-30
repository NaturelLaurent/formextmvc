<?php
namespace App\Repository;

use App\Service\SqlService;

class PersoRepository
{

    public function findAll()
    {
        $pdo = SqlService::getInstance();
        $query = $pdo->fetchAll('SELECT * FROM perso');

        return $query;
    }
    public function find($id)
    {
        $pdo = SqlService::getInstance();
        $query = $pdo->fetch('SELECT * FROM perso where id = :id ', [':id' => $id]);

        return $query;
    }
    public function data_format($data)
    {
        $datas = [];

        foreach ($data as $data){
            $dataobj = [
                "id" => $data['id'],
                "name" => $data['name'],
                "age" => $data['age'],
                "email" => $data['email']
            ];
            array_push($datas, $dataobj);
        }
        
        return $datas;

    }


}