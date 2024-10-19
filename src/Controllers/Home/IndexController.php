<?php

namespace App\Controllers\Home;

use App\Kernel\Controller\Controller;

class IndexController extends Controller
{

    public function index(){
        $this->view("home");
    }
}