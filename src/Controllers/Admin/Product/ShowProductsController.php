<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;

class ShowProductsController extends Controller
{

    public function show(){
        $this->view("admin/products/show");
    }
}