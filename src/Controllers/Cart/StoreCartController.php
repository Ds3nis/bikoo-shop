<?php

namespace App\Controllers\Cart;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;
use App\Services\ProductService;

class StoreCartController extends Controller
{
    public function store()
    {
        $service = new OrderService($this->db());
        $request = $this->request();
        $productId = $request->input("product_id");
        $quantity = $request->input("counter") ?? 1;

        $productPrice = $this->getProductPrice($productId);


        if ($this->auth()->check()) {
            $user = $this->auth()->user();
            $order = $service->find(["id_zakaznik" => $user->getId(), "stav" => 0]);
            if (is_null($order)) {
                $orderId = $service->insert([
                    "id_zakaznik" => $user->getId(),
                    "stav" => 0,
                    "cena" => 0,
                    "datum" => date("Y-m-d H:i:s")
                ]);
                $orderTotalPrice = 0;
            } else {
                $orderId = $order->id();
                $orderTotalPrice = $order->price();
            }
            $this->session()->set("order_id", $orderId);
        } else {
            $orderId = $this->session()->get("order_id");
            if (is_null($orderId)) {
                $orderId = $service->insert([
                    "stav" => 0,
                    "cena" => 0,
                ]);
                $orderTotalPrice = 0;
                $this->session()->set("order_id", $orderId);
            } else {
                $order = $service->find(["id" => $orderId]);
                $orderTotalPrice = $order ? $order->price() : 0;
            }
        }

        $existingProduct = $service->findProductInOrder($orderId, $productId);
        if ($existingProduct) {
            $newCount = min($existingProduct["mnozstvi"] + $quantity, 15);
            $newPrice = $productPrice * $newCount;
            $service->updateProductCount($orderId, $productId, $newPrice, $newCount);

            $priceDifference = $newPrice - $existingProduct["cena"];
            $updatedTotalPrice = $orderTotalPrice + $priceDifference;
        } else {
            $count = min($quantity, 15);
            $newPrice = $productPrice * $count;
            $service->addProductToOrder($orderId, $productId, $newPrice, $count);

            $updatedTotalPrice = $orderTotalPrice + $newPrice;
        }

        $service->update($orderId, [
            "cena" => $updatedTotalPrice
        ]);

        $this->session()->set("productCount", count($service->getProductsInOrder($orderId)));

        $this->session()->set("success", "Produkt byl úspěšně přidán do košíku");

        if (is_null($request->input("counter"))){
            $this->redirect("/catalog");
        }else{
            $this->redirect("/catalog/product/?id={$productId}");

        }

    }

    public function getProductPrice(int $product_id)
    {
        $productService = new ProductService($this->db());
        $product = $productService->find($product_id);

        return $product->price();
    }
}
