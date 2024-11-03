<?php

namespace App\Controllers\Catalog;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class IndexCatalogController extends Controller
{
    public function index(){
        $service = new ProductService($this->db());
        $products = $service->all();

        $this->view("/catalog/products", [
            "products" => $products
        ]);

    }
}