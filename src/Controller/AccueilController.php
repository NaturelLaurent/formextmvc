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

   

   



    
}