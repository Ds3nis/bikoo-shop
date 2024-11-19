<?php

namespace App\Controllers\User\Registration;

use App\Kernel\Controller\Controller;


class StoreRegistrationController extends Controller
{
    public function store():void{

        $validate = $this->request()->validate([
           "name" => "required|min:3|max:45",
            "last_name" => "required|min:3|max:45",
            "email" => "required|email|unique:zakaznik,email|max:100",
            "password" => "required|min:1",
            "password_confirmation" => "required|min:1|password_confirm:password",
            "phone" => "required|min:12|maxNumeric:12"
        ]);


        if (!$validate){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }


            $url = $this->request()->getUri();
            $this->redirect($url);
        }else{
            $id = $this->db()->insert("zakaznik", [
                "jmeno" => $this->request()->input("name"),
                "prijmeni" => $this->request()->input("last_name"),
                "telefon" => $this->request()->input("phone"),
                "email" => $this->request()->input("email"),
                "heslo" =>  password_hash($this->request()->input("password"), PASSWORD_DEFAULT)
            ]);

            $this->redirect("/");
        }



    }
}