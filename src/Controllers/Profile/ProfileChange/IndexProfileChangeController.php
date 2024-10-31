<?php

namespace App\Controllers\Profile\ProfileChange;

use App\Kernel\Controller\Controller;

class IndexProfileChangeController extends Controller
{
    public function index(){
        $this->view("/profile/profile-change");
    }

}