<?php
namespace App\Controller;

class ArticlesController extends AbstractController
{
    public function __construct()
    {
       
    }

    public function index()
    {
    
       
        $this->render('articlesView', [

        ]);
    }
}