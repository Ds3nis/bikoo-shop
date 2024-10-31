<?php

namespace App\Controllers\Profile\ProfileData;

use App\Kernel\Controller\Controller;

class IndexProfileDataController extends Controller
{
    public function index(){

        $this->view("/profile/profile",[
            "user" => $this->auth()->user()
        ]);
    }
}