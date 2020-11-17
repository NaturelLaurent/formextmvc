<?php
namespace Satawork\Route;

use Src\Controllers\AccueilController;


Route::get('/', [AccueilController::class,'show']);

Route::get('/profile', [AccueilController::class,'profile']);

Route::get('/articles', [AccueilController::class,'articles']);