<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class EditProductsController extends Controller
{
    public function edit(){
        $service = new ProductService($this->db());
        $product_id = $this->request()->input("id");

        $product = $service->find($product_id);




        $this->view("admin/products/edit", [
            "product" => $product
        ]);
    }
}