<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\SqlService;

class UserRepository
{
    private User $user;

  public function FunctionName(User $user)
  {
    SqlService::getInstance();
  }
   
}
