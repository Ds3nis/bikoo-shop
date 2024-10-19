<?php

namespace App\Controllers\User\Registration;

use App\Kernel\Controller\Controller;

class IndexRagistrationController extends Controller
{
    public function index(){
        $this->view("/user/registration");
    }
}