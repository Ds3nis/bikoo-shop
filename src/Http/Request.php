<?php

namespace App\Http;

class Request
{
    public function __construct(public readonly array $get, public readonly array $post, public readonly array $server, public readonly array $files, public readonly array $cookies){

    }

    public static function createFromGlobals(){

        return new static(
            $_GET,
            $_POST,
            $_SERVER,
            $_FILES,
            $_COOKIE,
        );
    }

    public function getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }

    public function getUri(){
        return $_SERVER["REQUEST_URI"];
    }
}