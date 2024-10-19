<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;

class IndexUsersController extends Controller
{
    public function index(){
        $this->view("/admin/user/index");
    }
}