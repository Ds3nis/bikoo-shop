<?php

namespace App\Controllers\User\Authorisation;

use App\Kernel\Controller\Controller;

class StoreAuthorisationController extends  Controller
{
    public function store(){
        $email = $this->request()->input("email");
        $password = $this->request()->input("password");

        if ( $this->auth()->attempt($email, $password)){
            $this->redirect("/profile");
        }else{
            $this->session()->set("login-error", "Nesprávný e-mail nebo heslo");
            $this->redirect("/authorisation");
        }



    }
}