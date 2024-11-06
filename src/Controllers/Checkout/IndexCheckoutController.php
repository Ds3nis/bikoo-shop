<?php

namespace App\Controllers\Checkout;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;
use App\Services\UserService;

class IndexCheckoutController extends Controller
{
    public function index(){
        $orderService = new OrderService($this->db());
        $userService = new UserService($this->db());
        $orderId = $this->session()->get("order_id");
        if(is_null($orderId)){
            $this->redirect("/");
        }

        $order = $orderService->find(["id" => $orderId]);

        if (is_null($order)) {
            $this->session()->remove("order_id");
            return $this->view("/");
        }

        $userId = $order->userId();
        $user = $userService->find($userId);

        $productsInOrder = $orderService->getProductsInOrder($orderId);
        $countAll = array_sum(array_map(fn($product) =>  $product->countInOrder() , $productsInOrder));

        $this->view("/checkout/checkout", [
            "order" => $order,
            "productsInOrder" => $productsInOrder,
            "user" => $user,
            "countAll" => $countAll
        ]);
    }

}