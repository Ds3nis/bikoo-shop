<?php

namespace App\Controllers\About;

use App\Kernel\Controller\Controller;

class IndexAboutController extends Controller
{

    public function index() : void{
        $this->view("/about/about");
    }

}