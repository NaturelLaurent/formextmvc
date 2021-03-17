<?php


namespace App\Service;


class Calc
{
    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function carre()
    {
        return $this->nombre * $this->nombre ;
    }

    public function cube()
    {
        return $this->nombre * $this->nombre * $this->nombre;
    }
}