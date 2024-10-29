<?php

namespace App\Kernel\Auth;

interface AuthInterface
{
    public function attempt(string $username, string $password) : bool;

    public function check() : bool;

    public function logout() : void;

    public function user() : ?array;

    public function table() : string;

    public function username() :string;

    public function password() : string;

}