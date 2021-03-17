<?php 
use App\Route;
use App\SPDO;
Use Src\Models\Article;

Route::api()->get('/api/articles', function () {
    
    $articles = Article::all()->get();
    $results =  $articles->fetchAll(PDO::FETCH_ASSOC);

    return $results;
});