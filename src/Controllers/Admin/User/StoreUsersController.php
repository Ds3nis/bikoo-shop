<?php

namespace App\Controllers\Admin\User;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class StoreUsersController extends Controller
{
    public function store(){

        $service = new UserService($this->db());

        $validated = $this->request()->validate([
            "name" => "required|min:3|max:45",
            "last_name" => "required|min:3|max:45",
            "email" => "required|email|unique:zakaznik|max:100",
            "password" => "required|min:1",
            "phone" => "required|min:12|maxNumeric:12",
            "role" => "required|numeric"
        ]);


        if (!$validated){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }


            $this->redirect("/admin/users");
        }


        $data = [
            "jmeno" => $this->request()->input("name"),
            "prijmeni" => $this->request()->input("last_name"),
            "telefon" =>   $this->request()->input("phone"),
            "email" => $this->request()->input("email"),
            "heslo" => password_hash($this->request()->input("password"), PASSWORD_DEFAULT),
            "role" => $this->request()->input("role"),
        ];

        $result = $service->insert($data);

        if ($result){
            $this->session()->set("success", "Uživatel {$data["jmeno"]} byl úspěšně přidán ");
        }else{
            $this->session()->set("dbfailed", "Při vkládání do databáze došlo k chybě");
        }

        $this->redirect("/admin/users");


    }
}