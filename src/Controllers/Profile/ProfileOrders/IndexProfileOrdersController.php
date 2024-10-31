<?php

namespace App\Controllers\Profile\ProfileOrders;

use App\Kernel\Controller\Controller;

class IndexProfileOrdersController extends Controller
{
    public function index(){
        $this->view("/profile/profile-orders");
    }

}