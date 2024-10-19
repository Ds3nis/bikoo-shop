<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;

class IndexProductsController extends Controller
{
    public function index(){
        $this->view("admin/products/index");
    }
}