<?php

namespace App\Kernel\Http;

use App\Kernel\Validator\ValidatorInterface;

interface RequestInterface
{
    public static function createFromGlobals();
    public function setValidator(ValidatorInterface $validator) : void;
    public function getMethod();
    public function validate(array $rules) : bool;
    public function input(string $param, $default = null);
    public function getUri();
    public function errors() : array;


}