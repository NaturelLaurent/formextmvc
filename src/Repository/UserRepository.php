<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\SqlService;

class UserRepository
{
  protected SqlService $sql;
 
  function __construct() {
     $this->sql = SqlService::getInstance();
    
 }

  public function getUserRepository()
  {   
   $nameTable = 'user';
   $user =$this->sql ->fetch($nameTable);
   
    return $user;
  }
   
}
