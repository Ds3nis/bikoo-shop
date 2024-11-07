<?php

namespace App\Controllers\Home;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class IndexController extends Controller
{

    public function index() : void{
        $service = new ProductService($this->db());

        $newProducts = $service->all(['created_at' => 'DESC'], 10);

        $this->view("home", [
            "newProducts" => $newProducts
        ]);
    }
}