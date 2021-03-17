<?php
namespace Src\Services;


class Tva
{
    public function __construct(float $price, string $type) {
        $this->price = $price;
        $this->type  = $type;
    }
   
    public function calcul() : float 
    {
        switch($this->type){
            case 'agricole':
                return number_format(10 * $this->price/ 100, 2);
                break;
            
            case 'alimentaire':
                return number_format(5.5 * $this->price/ 100, 2);
                break;
            
            case 'autre':
                return number_format(20 * $this->price/ 100, 2);
                break;
        }
    }
}