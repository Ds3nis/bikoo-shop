<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class IndexProductsController extends Controller
{
    public function index(){
        $service = new ProductService($this->db());
        $products = $service->all();
        $this->view("admin/products/index", [
            "products" => $products
        ]);
    }
}