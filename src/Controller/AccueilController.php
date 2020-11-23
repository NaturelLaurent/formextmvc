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
      if ( !empty($request['nom']) && !empty($request['prenom']) && !empty($request['email'])) {
          $user = new User();
          $user->setNom($request['nom'])
            ->setEmail( $request['email'])
            ->setPrenom($request['prenom']);
          $em = new EntityManager();
            $em->flush($user);
          
      }

        $this->render('formAddPersonne');
    }

    public function listUser(){
      
      $rep = new UserRepository();
      $users = $rep->getUserRepository();
    
      $this->render('listUser', [
        'listUser'=> $users
      ]);
    }

    public function accueil(){    
      
    
      $this->render('accueilView');
    }

    public function userSup( array $request)
    {
      $user = new User();
     $em  =new EntityManager();
     $em->delete($user, $request['id']);
     
    }

   

   



    
}