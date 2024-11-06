<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Order;
use App\Models\Product;


class OrderService
{
    public function __construct(private DatabaseInterface $db){

    }

    /**
     * @return array<Order>
     *
     */
    public function all() : array{
        $orders = $this->db->get("objednavka_obchodu");
        $orders =  array_map(function ($order) {
            return new Order(
                $order["id"],
                $order["id_zakaznik"],
                $order["cele_jmeno"],
                $order["telefon"],
                $order["mesto"],
                $order["psc"],
                $order["ulice"],
                $order["cislo_domu"],
                $order["stav"],
                $order["cena"],
                $order["datum"],
            );
        }, $orders);

        return  $orders;
    }

    public function getUserOrders(int $userId, int $status){
        $userOrders = $this->db->get("objednavka_obchodu", [
            "id_zakaznik" => $userId,
            "stav" => 1
        ]);
        $userOrders =  array_map(function ($order) {
            return new Order(
                $order["id"],
                $order["id_zakaznik"],
                $order["cele_jmeno"],
                $order["telefon"],
                $order["mesto"],
                $order["psc"],
                $order["ulice"],
                $order["cislo_domu"],
                $order["stav"],
                $order["cena"],
                $order["datum"],
            );
        }, $userOrders);

        return  $userOrders;
    }

    public function insert(array $data){
        $result = $this->db->insert("objednavka_obchodu", $data);

        if($result["success"] == false) {
            return false;
        }


        return $result["id"];
    }

    public function find($data) : ?Order{
        $order = $this->db->first("objednavka_obchodu",$data);

        if (!$order){
            return null;
        }

        return new Order(
            $order["id"],
            $order["id_zakaznik"],
            $order["cele_jmeno"],
            $order["telefon"],
            $order["mesto"],
            $order["psc"],
            $order["ulice"],
            $order["cislo_domu"],
            $order["stav"],
            $order["cena"],
            $order["datum"],
        );
    }

    public function delete(array $data){
        $result = $this->db->delete("objednavka_obchodu", $data);

        if($result["success"] == false) {
            return false;
        }

        return true;
    }

    public function update(int $id, array $data){

        $this->db->update("objednavka_obchodu",$data,
            [
                "id" => $id
            ]
        );
    }

    public function addProductToOrder(int $orderId, int $productId, int $price,  int $quantity) {
        $result = $this->db->insert("objednavka_produkt", [
            "id_objednavka" => $orderId,
            "id_prvek_produkt" => $productId,
            "cena" => $price,
            "mnozstvi" => $quantity
        ]);

        if($result["success"] == false) {
            return false;
        }

        return $result["success"];
    }

    public function updateProductCount(int $orderId, int $productId, int $price, int $quantity) {
        $this->db->update("objednavka_produkt",
            [
            "id_objednavka" => $orderId,
            "id_prvek_produkt" => $productId,
            "cena" => $price,
            "mnozstvi" => $quantity
            ],
            [
                "id_objednavka" => $orderId,
                "id_prvek_produkt" => $productId,
            ]
        );
    }

    public function findProductInOrder(int $orderId, int $productId) {
        return $this->db->first("objednavka_produkt", [
            "id_objednavka" => $orderId,
            "id_prvek_produkt" => $productId
        ]);
    }

    public function getProductsInOrder(int $orderId){
        $orderProducts = $this->db->get("objednavka_produkt", [
            "id_objednavka" => $orderId
        ]);
        $products = [];

        foreach ($orderProducts as $orderProduct) {
            $productDetails = $this->db->first("produkt", [
                "id" => $orderProduct["id_prvek_produkt"]
            ]);
            if ($productDetails) {
                $products[] =  new Product(
                    $productDetails["id"],
                    $productDetails["nazev"],
                    $productDetails["kod"],
                    $productDetails["obrazek"],
                    $productDetails["cena"],
                    $productDetails["popis"],
                    $productDetails["dostupnost"],
                    $productDetails["mnozstvi"],
                    $productDetails["created_at"],
                    $productDetails["updated_at"],
                    $orderProduct["mnozstvi"]
                );
            }
        }

        return $products;
    }

    public function removeProductFromOrder(int $orderId, int $productId){
        return $this->db->delete("objednavka_produkt",
        [
            "id_objednavka" => $orderId,
            "id_prvek_produkt" => $productId
        ]);
    }

}