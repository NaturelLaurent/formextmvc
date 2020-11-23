<?php
use App\Route;
use Src\Controllers\HomeController;


Route::get('/', [HomeController::class,'show']);

Route::get('/profile', [HomeController::class,'profile']);

Route::get('/articles', [HomeController::class,'articles']);