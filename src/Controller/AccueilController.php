<?php
namespace App\Controller;

class AccueilController extends AbstractController
{
    public function __construct()
    {
       
    }

    public function index()
    {
    
       
        $this->render('accueilView', [

        ]);
    }
}