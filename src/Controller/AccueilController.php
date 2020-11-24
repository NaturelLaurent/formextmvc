<?php

namespace App\Controller;

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
      $this->redirectTo('/listPersonne');
    } else {
      $this->render('formAddPersonne');
    }
  }

  public function listUser()
  {

    $rep = new UserRepository();
    $users = $rep->getUserRepository();

    $this->render('listUser', [
      'listUser' => $users
    ]);
  }

  public function accueil()
  {


    $this->render('accueilView');
  }

  public function userSup(array $request)
  {
    $user = new User();
    $em  = new EntityManager();
    $em->delete($user, $request['id']);
    $this->redirectTo('/listPersonne');
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
      $this->redirectTo('/listPersonne');
      
    } else {
      $rep = new UserRepository();
      $users = $rep->getUserRepository();
      $userCourant = null;
      foreach ($users as $user) {
        if ($user->id == $request['id']) {
          $userCourant = $user;
        }
      }
      $this->render('formModifPerson', [
        'userCourant' => $userCourant
      ]);
    }
  }
}
