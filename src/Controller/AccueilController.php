<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use App\Repository;
use App\Repository\UserRepository;
use App\Service\EntityManager;

class AccueilController extends AbstractContoller
{


  public function addPerson(array $request)
  {
    if (!empty($request['nom']) && !empty($request['prenom']) && !empty($request['email'])) {
      $user = new User();
      $user->setNom($request['nom'])
        ->setEmail($request['email'])
        ->setPrenom($request['prenom']);
      $em = new EntityManager();
      $em->flush($user);
      $this->json([
        'succes' => 'Utilisateur du nom: ' . $request['nom'] . ' à été ajouté'
      ], 200);
    }
  }

  public function listUser()
  {

    $rep = new UserRepository();
    $users = $rep->getUserRepository();

    $this->json($users, 200);
  }



  public function userSup(array $request)
  {

    $rep = new UserRepository();

    $users = $rep->getUserRepository();
    $userCourant = null;
    foreach ($users as $user) {
      if ($user->id == $request['id']) {
        $userCourant = $user;
      }
    }
    if ($userCourant == null) {
      $this->json([
        'error' => 'Utilisateur identifier par l\'id : ' . $request['id'] . ' non existant dans la base de donnée !!'
      ], 400);
    } else {
      $em  = new EntityManager();
      $user = new User();
      $em->delete($user, $request['id']);
      $this->json([
        'succes' => 'Utilisateur identifier par l\'id : ' . $request['id'] . ' est supprimé'
      ], 200);
    }
  }

  public function userModif(array $request)
  {
    if (!empty($request['nom']) && !empty($request['prenom']) && !empty($request['email'])) {
      $user = new User();
      $user->setNom($request['nom'])
        ->setEmail($request['email'])
        ->setPrenom($request['prenom']);

      $em = new EntityManager();
      $em->update($user, $request['id']);

      $this->json([
        'succes' => 'Utilisateur du nom: ' . $request['nom'] . ' est modifié'
      ], 200);
    }
  }

  public function addArticle(array $request)
  {

    // Pas encore implementé

  }

  public function getUtilisateur(array $request)
  {

    $rep = new UserRepository();
    $users = $rep->getUserRepository();
    $userCourant = null;

    foreach ($users as $user) {
      if ($user->id == $request['id']) {
        $userCourant = $user;
      }
    }

    if ($userCourant == null) {
      $this->json([
        'error' => 'Utilisateur identifier par l\'id : ' . $request['id'] . ' non existant dans la base de donnée !!'
      ], 400);
    } else {
      $this->json($userCourant, 200);
    }
  }
}
