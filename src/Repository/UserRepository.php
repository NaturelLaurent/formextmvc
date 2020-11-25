<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\SqlService;
use PDO;
use PDOException;

class UserRepository
{


    public function findAll()
    {
        $bdd = SqlService::getInstance();
        $users = $bdd->fetchAll('SELECT * FROM user');

        return $users;
    }
    public function add($nom, $prenom, $email, $password, $typeuser)
    {
        try {

            $bdd = SqlService::getInstance();
            $bdd->query("INSERT INTO
                                    user (nom, prenom, email, password, typeuser)
                                    VALUES ('$nom','$prenom','$email','$password','$typeuser')");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function find($id)
    {
        $bdd = SqlService::getInstance();
        $user = $bdd->fetch("SELECT * FROM
                                            user
                                            WHERE id = '$id'");
        return $user;
    }
    public function edit($id, $nom, $prenom, $email, $password, $typeuser)
    {
        try {

            $bdd = SqlService::getInstance();
            $bdd->query("UPDATE user SET
                                            nom = '$nom',
                                            prenom = '$prenom',
                                            email = '$email',
                                            password = '$password',
                                            typeuser = '$typeuser'
                                            WHERE id = '$id'");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
