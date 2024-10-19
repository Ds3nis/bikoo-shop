<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;

class ShowUsersController extends Controller
{
    public function show(){
        $this->view("/admin/user/show");
    }
}