<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class DeleteUsersController extends Controller
{
public function delete(){
    $service = new UserService($this->db());

    $user_id = $this->request()->input("user_id");
    dd($user_id);
    $user = $service->find($user_id);

    if ($user_id == $this->auth()->user()->getId()){
        $this->auth()->logout();
        if (!is_null($this->session()->get("order_id"))){
            $this->session()->remove("order_id");
        }
        if (!is_null($this->session()->get("productCount"))){
            $this->session()->remove("productCount");
        }
    }

    $verify = $service->delete([
        "id" => $user_id
    ]);


    if ($verify){
        $this->session()->set("success", "Uživatel № $user_id {$user->name()}  byl úspěšně vymazan");
    }else{
        $this->session()->set("failed", "Při vymazani uživatele s databáze došlo k chybě");
    }
    return $this->redirect("/admin/users");
}
}