<?php
namespace App;

use App\RouteRegistrar;

class Route 
{
    public static function get($segment, $view) {
        $RouteRegistrar = new RouteRegistrar(false);
        return  $RouteRegistrar->get($segment, $view);
    }

    public static function api() {
        return new RouteRegistrar(true);
    }

}