<?php

namespace App\Controllers\Admin\Order;

use App\Kernel\Controller\Controller;
use App\Models\Product;
use App\Services\OrderService;

class ShowOrdersController extends Controller
{

    public function show(){
        $orderService = new OrderService($this->db());
        $order_id = $this->request()->input("id");
        $order = $orderService->find([
            "id" => $order_id
        ]);

        if(is_null($order)){
            $this->redirect("/admin/orders");
        }

        $products = [];
        $countProducts = 0;
        $orderProducts = $orderService->getOrderProducts($order_id);
        $countProducts = array_map(fn($orderProducts) => $countProducts += $orderProducts["mnozstvi"], $orderProducts)[0];

        $productsObj = $orderService->getProductsInOrder($order_id);
        foreach ($productsObj as $product){
            $products[$product->id()] = $product;
        }

        $this->view("admin/orders/show", [
            "order" => $order,
            "orderProducts" => $orderProducts,
            "products" => $products,
            "countProducts" => $countProducts
        ]);
    }

}