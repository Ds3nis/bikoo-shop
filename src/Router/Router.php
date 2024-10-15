<?php

namespace App\Router;

class Router
{

    private array $routes = [
        "GET" => [],
        "POST" => []
    ];
    public function __construct(){
        $this->initRoutes();
    }



    public function dispatch(string $uri, string $method){
        $route = $this->findRoute($uri, $method);


        if (!$route){
            $this->notFound();
            exit();
        }

        if(is_array($route->getAction())){

            [$controller, $func] = $route->getAction();

            $controller = new $controller();

            call_user_func([$controller, $func]);

        }else{
            call_user_func($route->getAction()());
        }


    }

    private function notFound(){
        echo "404 | not found";
    }

    private function findRoute(string $uri, string $method) : Route|false{
        if (!isset($this->routes[$method][$uri])){
            return  false;
        }else{
            return $this->routes[$method][$uri];
        }

    }

    private function initRoutes(){
        $routes = $this->getRoutes();

        foreach ($routes as $route){
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }


    }

    public function getRoutes(){
        return require_once (APP_PATH . "/config/routes.php");
    }
}