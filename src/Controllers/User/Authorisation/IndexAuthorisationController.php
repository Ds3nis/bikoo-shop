<?php

namespace App\Controllers\User\Authorisation;

class IndexAuthorisationController extends \App\Kernel\Controller\Controller
{
    public function index(){
        $this->view("/user/authorisation");
    }
}