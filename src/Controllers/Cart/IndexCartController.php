<?php

namespace App\Controllers\Cart;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;
use App\Services\ProductService;

class IndexCartController extends Controller
{
    public function index(){
        $orderService = new OrderService($this->db());
        $productService = new ProductService($this->db());


        $orderId = $this->session()->get("order_id");

        if (is_null($orderId)){
            $this->view("/cart/shopping-cart",
                [
                    "order" => null,
                    "products" => []
                ]
            );
        }

        $order = $orderService->find(["id" => $orderId]);

        if (is_null($order)) {
            $this->session()->remove("order_id");
            return $this->view("/cart/shopping-cart", ["order" => null, "products" => []]);
        }


        $productsInOrder = $orderService->getProductsInOrder($orderId);



        return $this->view("/cart/shopping-cart", ["order" => $order, "products" => $productsInOrder]);




    }
}