<?php

namespace App\config;


class Router
{
    private $url;
    private $routes = [];

    public function __construct($url)
    {

        $this->url = $url;
    }

    public function get($path, $callable, $name = null)
    {

        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null)
    {

        return $this->add($path, $callable, $name, 'POST');
    }

    public function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if (is_string($callable) && $name === null) {
            $name = $callable;
        }
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run()
    {
        var_dump($_SERVER['REQUEST_METHOD']);

        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes as $route) {
            $url = $this->url;
            var_dump($route);
            if ($route->match($url)) {
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }
    public function url($name, $params = [])
    {
        if (!isset($this->namedRoutes[$name])) {
            throw new RouterException('No route matches in this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

    public function chekerUrl()
    {

        $routemap = file_get_contents("route.json", true);
        $parsed_json = json_decode($routemap, true);
        $parsed_json = array_values($parsed_json);
        $urlfull = explode("/", $this->url, 2);
        unset($urlfull[array_search("", $urlfull)]);
        $urlfull = $urlfull[1];
        $urlfull = explode("/", $urlfull, 2);
        $urlpath = "/" . $urlfull[0];
        if(isset($urlfull[1])){
            $urlparam = 'id';
            $key = array_search($urlpath.'/'.$urlparam, array_column($parsed_json, 'path'));
        }else{
            $key = array_search($urlpath, array_column($parsed_json, 'path'));
        }
        if ($key === false) {
            throw new RouterException('No route matches in this name');
        }

        $val = array_values($parsed_json[$key]);

        $path = $val[0];
        $controller = $val[1];
        $method = $val[2];
        $type = $val[3];
        $routing = [$path, $controller, $method, $type];

        return $routing;
    }
}
