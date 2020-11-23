<?php
namespace Src\Controllers;

Use Src\Models\Article;

class HomeController
{

    public function show()
    { 

        return view('accueil');         
    }

    public function profile()
    {

        return view('profile'); 
    }

    public function articles()
    {
       
        $articles        =   Article::all()->get();
       
        return View('articles', [
            'articles' => $articles
        ]);        
    }
}