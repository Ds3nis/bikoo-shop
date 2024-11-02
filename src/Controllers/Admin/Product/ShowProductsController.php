<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class ShowProductsController extends Controller
{

    public function show(){
        $service = new ProductService($this->db());
        $product_id = $this->request()->input("id");

        $product = $service->find($product_id);
        $this->view("admin/products/show", [
            "product" => $product
        ]);
    }
}