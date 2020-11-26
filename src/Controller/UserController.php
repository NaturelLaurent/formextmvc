<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
  public function __construct()
  {
  }

  public function index()
  { 
    $usersList = [];
    $repo = new UserRepository;
    $users = $repo->findAll();

    foreach($users as $users)
    {
      $id = $users['id'];
      $nom = $users['nom'];
      $prenom = $users['prenom'];
      $email = $users['email'];
      $user = new User();
      $user->setId($id)->setName($nom)->setPrenom($prenom)->setEmail($email);

      array_push($usersList, $user);
    }
    
    //$users = affiche($users);

    $this->render('usersView', [
      'users' => $usersList
    ]);
  }
  public function edit($id){
    echo "je suis sur edit ".$id;

  }
}
