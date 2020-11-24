<?php
namespace App\Controller;

use App\Repository\UserRepository;

class UserController extends AbstractController
{
    public function __construct()
    {
       
    }

    public function index()
    {
        $repo = new UserRepository;
        $users = $repo->findAll();
        var_dump($users);
        $this->render('usersView', [
          
        ]);
    }
}