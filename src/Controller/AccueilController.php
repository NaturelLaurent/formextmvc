<?php
namespace App\Controller;
use App\Service\SqlService;

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