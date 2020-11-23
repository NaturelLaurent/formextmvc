<?php
namespace App\Controller;

class UserController extends AbstractController
{
    public function __construct()
    {
       
    }

    public function index()
    {
    
        $this->render('usersView', [

        ]);
    }
}