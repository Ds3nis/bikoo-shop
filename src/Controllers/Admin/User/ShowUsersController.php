<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class ShowUsersController extends Controller
{
    public function show(){
        $service = new UserService($this->db());

        $user_id = $this->request()->input("id");
        $user = $service->find($user_id);

        $this->view("/admin/user/show", [
            "user" => $user
        ]);
    }
}