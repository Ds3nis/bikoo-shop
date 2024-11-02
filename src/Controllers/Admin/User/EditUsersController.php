<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class EditUsersController extends Controller
{
    public function edit(){
        $service = new UserService($this->db());
        $user_id = $this->request()->input("id");

        $currentUser = $service->find($user_id);




        $this->view("/admin/user/edit",[
            "user" => $currentUser
        ]);
    }
}