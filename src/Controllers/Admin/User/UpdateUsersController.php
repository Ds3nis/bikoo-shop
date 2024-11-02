<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class UpdateUsersController extends Controller
{
    public function update(){
        $service = new UserService($this->db());
        $user_id = $this->request()->input("id");

        $currentUser = $service->find($user_id);

        $data = [
            "name" => "required|min:3|max:45",
            "last_name" => "required|min:3|max:45",
            "phone" => "required|min:12|maxNumeric:12",
        ];


        if ($currentUser->email() != $this->request()->input("email")){
            $data["email"] = "required|email|unique:zakaznik,email|max:100";
        }
        $validate = $this->request()->validate($data);



        if(!$validate){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }


            $this->redirect('/admin/edit/' . '?id=' . $user_id);
        }




        $service->update($user_id,
            [
                "jmeno" => $this->request()->input("name"),
                "prijmeni" => $this->request()->input("last_name"),
                "telefon" =>   $this->request()->input("phone"),
                "email" => $this->request()->input("email"),
                "role" => $this->request()->input("role"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );
        $this->session()->set("updated", "Osobní údaje uživatele № {$user_id} byly úspěšně upraveny");
        $this->redirect('/admin/edit/' . '?id=' . $user_id);

    }
}