<?php

namespace App\Kernel\Router;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\Request;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Middleware\AbstractMiddleware;
use App\Kernel\Middleware\MiddlewareInterface;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;
use App\Kernel\View\View;
use App\Kernel\Router\RouterInterface;
use App\Kernel\View\ViewInterface;

class Router implements RouterInterface
{

    private array $routes = [
        "GET" => [],
        "POST" => [],
        "DELETE" => [],
    ];
    public function __construct(
        private ViewInterface $view,
        private RequestInterface $request,
        private RedirectInterface $redirect,
        private SessionInterface  $session,
        private DatabaseInterface $database,
        private AuthInterface $auth,
        private ConfigInterface $config,
    ){
        $this->initRoutes();
    }



    public function dispatch(string $uri, string $method){
//        var_dump($this->session->getSession());
        $route = $this->findRoute($uri, $method);



        if (!$route){
            $this->notFound();
            exit();
        }



        if ($route->hasMiddlewares()){
            foreach ($route->getMiddlewares() as $middleware){
                /**
                 * @var AbstractMiddleware $middleware
                 */
                $middleware = new $middleware($this->request, $this->auth, $this->redirect);

                $middleware->handle();
            }
        }

        if(is_array($route->getAction())){

            [$controller, $func] = $route->getAction();

            $controller = new $controller();

            if ($controller && method_exists($controller, "setView")) {
                call_user_func([$controller, "setView"], $this->view);
                call_user_func([$controller , "setRequest"],$this->request);
                call_user_func([$controller, "setRedirect"], $this->redirect);
                call_user_func([$controller, "setSession"], $this->session);
                call_user_func([$controller, "setDatabase"], $this->database);
                call_user_func([$controller, "setAuth"], $this->auth);
                call_user_func([$controller, "setConfig"], $this->config);
            }


            call_user_func([$controller, $func]);

        }else{
            call_user_func($route->getAction()());
        }


    }

    private function notFound($code = 404, $message = "Not Found"){
        http_response_code($code); // Встановлюємо HTTP-код відповіді

        if ($code === 404) {
            extract(["view" => $this->view]);
            include APP_PATH . "/views/pages/notfound/404.php";
        } else {
            echo "<h1>Error $code</h1>";
            echo "<p>$message</p>";
        }
        exit;

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

    private function getRoutes() : array{
        return require_once (APP_PATH . "/config/routes.php");
    }
}