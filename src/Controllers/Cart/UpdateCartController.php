<?php

namespace App\Controllers\Cart;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;
use App\Services\ProductService;

class UpdateCartController extends Controller
{
    public function updateQuantity()
    {
        $service = new OrderService($this->db());
        $productService = new ProductService($this->db());
        $request = $this->request();
        $productId = $request->input("product_id");
        $action = $request->input("action");


        $orderId = $this->session()->get("order_id");
        if (is_null($orderId)) {
            return $this->redirect("/cart");
        }

        $product = $service->findProductInOrder($orderId, $productId);
        $productFull = $productService->find($productId);
        $order = $service->find([
            "id" => $orderId
        ]);

        if ($product) {
            $oldQuantity = $product["mnozstvi"];
            $oldPrice = $product["cena"];
            if ($action === "increase") {
                $quantity = min($oldQuantity + 1, 15);
            } elseif ($action === "decrease") {
                $quantity = max($oldQuantity - 1, 1);
            }

            $newPrice = $productFull->price() * $quantity;

            $service->updateProductCount($orderId, $productId, $newPrice, $quantity);
            $service->update($orderId, [
                "cena" => ($order->price() - $oldPrice) + $newPrice
            ]);
        }

        return $this->redirect("/shopping-cart");
    }

    public function remove()
    {
        $service = new OrderService($this->db());
        $request = $this->request();
        $productId = $request->input("product_id");
        $orderId = $this->session()->get("order_id");
        $product = $service->findProductInOrder($orderId, $productId);
        if (!is_null($orderId)) {
            $service->removeProductFromOrder($orderId, $productId);
        }

        $order = $service->find(["id" => $orderId]);

        $service->update($orderId, [
            "cena" => ($order->price() - $product["cena"])
        ]);

        return $this->redirect("/shopping-cart");
    }
}