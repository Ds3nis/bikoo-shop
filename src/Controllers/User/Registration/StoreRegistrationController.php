<?php

namespace App\Controllers\User\Registration;

use App\Kernel\Controller\Controller;


class StoreRegistrationController extends Controller
{
    public function add():void{
        dd($this->request()->input("name"));
    }
}