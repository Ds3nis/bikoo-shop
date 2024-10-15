<?php

namespace App;

use App\Router\Router;
use App\Http\Request;

class App
{
    public function __construct(){

    }

    public function run(){

       $router = new Router();

       $request = Request::createFromGlobals();

       $method = $request->getMethod();
       $uri = $request->getUri();

       $router->dispatch($uri, $method);
    }
}