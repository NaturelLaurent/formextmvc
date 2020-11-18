<?php


namespace App\Controller;


class AbstractController
{

    public function render(string $_nomTPL, array $param)
    {
        extract($param, EXTR_SKIP);

        require(dirname(__DIR__).'/templates/'.$_nomTPL.'.php');
    }
}