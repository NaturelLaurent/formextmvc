<?php
namespace Src\Controllers;

Use Src\Models\Article;
Use Src\Services\Date;

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

    public function addArticle()
    {
       
        
        return Redirect('articles');
    }

    public function modifyArticle(int $id)
    {
       
        return Redirect('articles');
    }

    public function removeArticle(int $id)
    {

        Article::find($id)->delete();
       
        return Redirect('articles');
    }

    public function testing(string $test)
    {
        return $test;
    }

    public function myDate(string $date)
    {
        $date = new Date($date);
        return $date->ifDate();
    }
}