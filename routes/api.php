<?php 
use App\Route;


Route::api()->get('/api/articles', function () {

    return array("message" => "No products found.");

});