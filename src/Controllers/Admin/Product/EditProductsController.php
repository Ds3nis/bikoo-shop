<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;

class EditProductsController extends Controller
{
    public function edit(){
        $this->view("admin/products/edit");
    }
}