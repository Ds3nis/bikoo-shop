<?php

namespace App\Controllers\User\ForgotPass;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class UpdateForgotPassController extends Controller
{

    public function update(){
        $token = $this->request()->input("token");
        if (isset($token)){
            $service = new UserService($this->db());
            $tokenHash = hash("sha256", $token);
            $user = $service->findData([
                "reset_token_hash" => $tokenHash
            ]);

            if ($user == null){
                $this->abort();
            }
            if(strtotime($user["reset_token_expires_at"] <= time())){
                $this->abort(404, "Token has expired");
            }


            $service = new UserService($this->db());

            $validate = $this->request()->validate([
                "password" => "required|min:1",
                "password_confirmation" => "required|min:1|password_confirm:password",
            ]);


            if (!$validate){
                $errors = $this->request()->errors();
                foreach ($errors as $field => $error){
                    $this->session()->set($field, $error);
                }
                $this->redirect("/reset-password?token={$token}");
            }else{
                $passwordHash = password_hash($this->request()->input("password"), PASSWORD_DEFAULT);

                $service->update($user["id"], [
                    "heslo" => $passwordHash,
                    "reset_token_hash" => NULL,
                    "reset_token_expires_at" => NULL
                ]);

                    $this->session()->set("reset-success", "Heslo bylo úspěšně změněno. Nyní se můžete přihlásit");
                    $this->redirect("/authorisation");


            }


        }else{
            $this->abort();
        }

    }

}