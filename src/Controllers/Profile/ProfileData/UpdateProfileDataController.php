<?php

namespace App\Controllers\Profile\ProfileData;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class UpdateProfileDataController extends Controller
{
    public function update(){
        $user = new UserService($this->db());
        $currentUser = $this->auth()->user();
        $data = [
                "name" => "required|min:3|max:45",
                "last_name" => "required|min:3|max:45",
                "phone" => "required|min:12|maxNumeric:12",
        ];


        if ($currentUser->getEmail() != $this->request()->input("email")){
            $data["email"] = "required|email|unique:zakaznik|max:100";
        }
        $validate = $this->request()->validate($data);


        if(!$validate){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }


            $url = $this->request()->getUri();
            $this->redirect($url);
        }




        $user->update($this->request()->input("id"),
            [
                "jmeno" => $this->request()->input("name"),
                "prijmeni" => $this->request()->input("last_name"),
                "telefon" =>   $this->request()->input("phone"),
                "email" => $this->request()->input("email"),
            ]
        );
        $this->session()->set("updated", "Osobní údaje byly úspěšně upraveny");
        $this->redirect($this->request()->getUri());

    }
}