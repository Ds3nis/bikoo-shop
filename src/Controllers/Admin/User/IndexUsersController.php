<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class IndexUsersController extends Controller
{
    public function index(){

        $users = new UserService($this->db());
        $users = $users->all();

        $this->view("/admin/user/index", [
            "users" => $users
        ]);
    }
}