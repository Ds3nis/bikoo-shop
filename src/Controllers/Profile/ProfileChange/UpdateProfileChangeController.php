<?php

namespace App\Controllers\Profile\ProfileChange;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class UpdateProfileChangeController extends Controller
{
    public function update(){

        $service = new UserService($this->db());

        $validate = $this->request()->validate([
            "password" => "required|min:1",
            "newpassword" => "required|min:1",
            "newpassword_confirmation" => "required|min:1|password_confirm:newpassword",
        ]);


        if(!$validate){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }

            $url = $this->request()->getUri();
            $this->redirect($url);
        }

        $currentUser = $this->auth()->user();
        $verify = password_verify($this->request()->input("password"), $currentUser->getPassword());
        if ($verify) {
            $newpassword = password_hash($this->request()->input("newpassword"), PASSWORD_DEFAULT);

            $service->update($currentUser->getId(), [
                "heslo" => $newpassword
            ]);

            $this->session()->set("verify", "Heslo bylo úspěšně aktualizováno");
            $this->redirect($this->request()->getUri());
        } else {
            $this->session()->set("notverify", "Aktuální heslo neodpovídá");
            $this->redirect($this->request()->getUri());
        }

    }

}