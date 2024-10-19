<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;

class EditUsersController extends Controller
{
    public function edit(){
        $this->view("/admin/user/edit");
    }
}