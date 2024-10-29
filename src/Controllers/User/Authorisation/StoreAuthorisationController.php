<?php

namespace App\Controllers\User\Authorisation;

use App\Kernel\Controller\Controller;

class StoreAuthorisationController extends  Controller
{
    public function store(){
        $email = $this->request()->input("email");
        $password = $this->request()->input("password");

        dd($this->auth()->attempt($email, $password));

    }
}