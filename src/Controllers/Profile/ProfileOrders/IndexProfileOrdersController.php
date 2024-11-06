<?php

namespace App\Controllers\Profile\ProfileOrders;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;

class IndexProfileOrdersController extends Controller
{
    public function index(){
        $service = new OrderService($this->db());
        $user_id = $this->auth()->user()->getId();
        $userOrders = $service->getUserOrders($user_id, 1);



        $orderProducts = [];

        foreach ($userOrders as $order) {
            $orderId = $order->id();
            $orderProducts[$orderId] = $service->getProductsInOrder($orderId);
        }


        $this->view("/profile/profile-orders", [
            "orders" => $userOrders,
            "ordersProduct" => $orderProducts,
        ]);
    }

}