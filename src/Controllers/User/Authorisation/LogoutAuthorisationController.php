<?php

namespace App\Controllers\User\Authorisation;

use App\Kernel\Controller\Controller;

class LogoutAuthorisationController extends Controller
{

    public function logout(){
        $this->auth()->logout();
        if (!is_null($this->session()->get("order_id"))){
            $this->session()->remove("order_id");
        }
        $this->redirect("/");
    }

}