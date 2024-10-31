<?php

namespace App\Controllers\Cart;

use App\Kernel\Controller\Controller;

class IndexCartController extends Controller
{
    public function index(){
        $this->view("/cart/shopping-cart");
    }
}