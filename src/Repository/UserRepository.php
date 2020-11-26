<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\ClientService;


class UserRepository
{
  protected ClientService $clientService;
 
  function __construct() {
     $this->clientService = new ClientService();
    
 }


  public function getUserRepository()
  {
  
   $user =  $this->clientService->fetch(); 
    
    return json_decode($user, false);
  }
   
}
