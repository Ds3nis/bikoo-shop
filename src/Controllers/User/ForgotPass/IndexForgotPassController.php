<?php

namespace App\Controllers\User\ForgotPass;

use App\Kernel\Controller\Controller;

class IndexForgotPassController extends Controller
{
    public function index(){
        $this->view("/user/forgot-password");
    }
}