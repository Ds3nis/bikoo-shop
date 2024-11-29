<?php

namespace App\Controllers\Admin\Main;
use App\Kernel\Controller\Controller;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\UserService;

class IndexAdmMainController extends Controller
{
    public function index(){
        $productService = new ProductService($this->db());
        $userService = new UserService($this->db());
        $orderService = new OrderService($this->db());

        $orders = $orderService->getOrdersStatus([
            "stav" => [">=", "2"]
        ]);

        $users = $userService->all();
        $products = $productService->all();

        $this->view("/admin/main/index", [
            "users" => $users,
            "products" => $products,
            "orders" => $orders
        ]);
    }
}