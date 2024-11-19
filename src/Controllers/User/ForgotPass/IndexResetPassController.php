<?php

namespace App\Controllers\User\ForgotPass;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class IndexResetPassController extends Controller
{
    public function index(){
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

            $this->view("/user/reset-password", [
                "token" => $token
            ]);


        }else{
            $this->abort();
        }
    }
}