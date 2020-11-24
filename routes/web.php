<?php
use App\Route;
use Src\Controllers\HomeController;


Route::get('/', [HomeController::class,'show']);

Route::get('/profile', [HomeController::class,'profile']);

Route::get('/articles', [HomeController::class,'articles']);
Route::get('/articles/add', [HomeController::class,'addArticle']);
Route::get('/articles/modify/{id}', [HomeController::class,'modifyArticle']);
Route::get('/articles/del/{id}', [HomeController::class,'removeArticle']);


