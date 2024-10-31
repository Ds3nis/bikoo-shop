<?php

namespace App\Controllers\User\Authorisation;

use App\Kernel\Controller\Controller;

class LogoutAuthorisationController extends Controller
{

    public function logout(){
        $this->auth()->logout();
        $this->redirect("/");
    }

}