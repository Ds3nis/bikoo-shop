<?php

namespace App\Router;

class Route
{
    public function __construct(private string $uri, private string $method, private $action){

    }

    public static function get(string $uri, $action) :self {
        return new static($uri, "GET", $action);
    }

    public static function post(string $uri, string $method, $action) : self{
        return new static($uri, $method, $action);
    }



    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction()
    {
        return $this->action;
    }
}