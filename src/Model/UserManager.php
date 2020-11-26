<?php

class UserManager

{
    private array $info;
    

    public function __construct()
    {
        $this->info = [
            'login'=>'alexisdournin@gmail.com',
            'mdp' =>'root'
        ];
    }

    public function getInfo() : User
    {
        $user = new User();
        $user->setLogin($this->info['login'])->setPrenom($this->info['nom']);

        return $user;
    }
}

function getPostArticle()
{
    try
    {
        //coordonnées de ma db
        $db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    //si exception je gère l'erreur
    {
        die('Erreur : '.$e->getMessage());
    }
    //J'exécute la requête
    $req = $db->query('SELECT id, titreArticle, auteur, dateArticle FROM Articles ORDER BY dateArticle DESC LIMIT 0, 5');

    return $req;
}
