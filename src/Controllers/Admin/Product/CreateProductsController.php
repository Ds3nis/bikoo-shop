<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;

class CreateProductsController extends Controller
{
    public function create(){
        $this->view("admin/products/create");
    }
}