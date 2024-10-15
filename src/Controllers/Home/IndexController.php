<?php

namespace App\Controllers\Home;

class IndexController
{

    public function index(){
        include_once (APP_PATH . "/views/pages/home.php");
    }
}