<?php

namespace App\Kernel\Http;

use App\Kernel\Validator\Validator;
use App\Kernel\Validator\ValidatorInterface;

class Request implements RequestInterface
{

    private ValidatorInterface $validator;
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


    /**
     * @param Validator $validator
     * @return void
     */
    public function setValidator(ValidatorInterface|\App\Kernel\Http\Validator $validator) : void{
        $this->validator = $validator;
    }

    public function validate(array $rules) : bool{
        $data =  [];
        foreach ($rules as $field=>$rule){
            $data[$field] = $this->input($field);
        }

        return $this->validator->validate($data, $rules);
    }

    public function getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }

    public function input(string $param, $default = null){
        return $this->post[$param] ?? $this->get[$param] ?? $default;
    }

    public function getUri(){
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function errors() : array{
        return $this->validator->errors();
    }
}