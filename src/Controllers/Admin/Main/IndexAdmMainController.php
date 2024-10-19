<?php

namespace App\Controllers\Admin\Main;
use App\Kernel\Controller\Controller;

class IndexAdmMainController extends Controller
{
    public function index(){
        $this->view("/admin/main/index");
    }
}