<?php

namespace App\Service;

class traitementUrl {

  public function getAndDelete(array $url)
    {
        $param['status'] = true;       
           
            for ($i = 1; $i < count($url); $i++) {
                if ($i == 2) {
                    if (is_numeric($url[$i])) {
                        $param['id'] = $url[$i];
                    } else {
                        $param['status'] = false;
                    }
                } 
                if($i > 2) {
                    $param['param' . $i] = $url[$i];
                }
            }
        

        return $param;
    }

}
    

