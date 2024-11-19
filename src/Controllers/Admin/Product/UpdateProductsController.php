<?php

namespace App\Controllers\Admin\Product;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class UpdateProductsController extends Controller
{
    public function update()
    {
        $service = new ProductService($this->db());
        $product_id = $this->request()->input("product_id");
        $validation = $this->request()->validate([
            "title" => "string|required|min:2|max:200",
            'image' => 'array|max:6048|mimes:png,jpg,svg,webp,jpeg',
            "price" => "numeric|required|min:1",
            "is_available" => "numeric",
            "quantity" => "numeric|required",
            "description" => "string|required",
        ]);

        if (!$validation) {
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/admin/product/edit/' . '?id=' . $product_id);
        }

        $images = $this->request()->input("image");
        $hiddens = $this->request()->input("hidden");
        if (!empty(array_filter($images['name']))) {
            $uploadedArray = $this->request()->file("image");
            if ($uploadedArray) {
                $paths = [];
                foreach ($uploadedArray as $uploadedFile) {
                    $filePath = $uploadedFile->move('upload');
                    if ($filePath !== false) {
                        $paths[] = $filePath;
                    } else {
                        throw new Exception("Soubor se nepodařilo uložit {$uploadedFile->getName()}.");
                    }
                }
            }
                $imagesPath = "$hiddens" . '|' . implode('|', $paths);
            } else {
                $imagesPath = $hiddens;
            }

            $service->update($product_id,
                [
                    "nazev" => $this->request()->input("title"),
                    "obrazek" => $imagesPath,
                    "cena" => $this->request()->input("price"),
                    "popis" => $this->request()->input("description"),
                    "dostupnost" => $this->request()->input("is_available"),
                    "mnozstvi" => $this->request()->input("quantity"),
                    "updated_at" => date("Y-m-d H:i:s"),
                ]
            );

            $this->session()->set("updated", "Udaje produky № {$product_id} byly úspěšně upraveny");
            $this->redirect('/admin/product/edit/' . '?id=' . $product_id);
        }
}