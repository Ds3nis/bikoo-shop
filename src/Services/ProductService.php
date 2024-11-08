<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Product;

class ProductService
{
    public function __construct(private DatabaseInterface $db){

    }

    /**
     * @return array<Product>
     *
     */
    public function all(array $conditions = [], array $order = [], int $limit = -1, int $offset = 0) : array{
        $products = $this->db->get("produkt", $conditions, $order, $limit, $offset);
        $products =  array_map(function ($product) {
            return new Product(
                $product["id"],
                $product["nazev"],
                $product["kod"],
                $product["obrazek"],
                $product["cena"],
                $product["popis"],
                $product["dostupnost"],
                $product["mnozstvi"],
                $product["created_at"],
                $product["updated_at"],
            );
        }, $products);

        return  $products;
    }



    public function insert(array $data){
        $result = $this->db->insert("produkt", $data);

        if($result["success"] == false) {
            return false;
        }

        return true;
    }


    public function find(int $id) : ?Product{
        $product = $this->db->first("produkt",[
            "id" => $id
        ]);

        if (!$product){
            return null;
        }

        return new Product(
            $product["id"],
            $product["nazev"],
            $product["kod"],
            $product["obrazek"],
            $product["cena"],
            $product["popis"],
            $product["dostupnost"],
            $product["mnozstvi"],
            $product["created_at"],
            $product["updated_at"],
        );
    }

    public function delete(array $data){
        $result = $this->db->delete("produkt", $data);

        if($result["success"] == false) {
            return false;
        }

        return true;
    }

    public function update(int $id, array $data){

        $this->db->update("produkt",$data,
            [
                "id" => $id
            ]
        );
    }
}