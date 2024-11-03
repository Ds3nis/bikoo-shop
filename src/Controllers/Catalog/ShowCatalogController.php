<?php

namespace App\Controllers\Catalog;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class ShowCatalogController extends Controller
{

    public function show(){
        $service = new ProductService($this->db());
        $product_id = $this->request()->input("id");
        $product = $service->find($product_id);

        $this->view("/catalog/product-page", [
            "product" => $product
        ]);

    }

}