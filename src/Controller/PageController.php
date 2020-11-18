<?php

namespace App\Controller;
class PageController{


    public function show ($request){
    
        require (dirname(__DIR__).'/templates/accueilView.php');
    }

  

    
}
