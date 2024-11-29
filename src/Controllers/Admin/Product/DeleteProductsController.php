<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class DeleteProductsController extends Controller
{
    public function delete() {
        $service = new ProductService($this->db());

        $product_id = $this->request()->input("product_id");
        $product = $service->find($product_id);

        if ($product) {

            $images = explode('|', $product->images());


            foreach ($images as $imagePath) {
                $filePath = APP_PATH . "/public/" . $imagePath;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $verify = $service->delete(["id" => $product_id]);

            if ($verify) {
                $this->session()->set("success", "Produkt № {$product->id()} {$product->name()} byl úspěšně vymazán");
            } else {
                $this->session()->set("failed", "Při vymazání produktu z databáze došlo k chybě");
            }
        } else {
            $this->session()->set("failed", "Produkt nebyl nalezen.");
        }

        return $this->redirect("/admin/products");
    }

}