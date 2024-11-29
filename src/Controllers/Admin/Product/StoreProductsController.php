<?php

namespace App\Controllers\Admin\Product;



use App\Kernel\Controller\Controller;
use App\Services\ProductService;

class StoreProductsController extends Controller
{
    public function store(){


       $service = new ProductService($this->db());
        $validation = $this->request()->validate([
            "title" => "string|required|min:2|max:200",
            "code" => "numeric|required|min:1|maxNumeric:10|unique:produkt,kod",
            'image' => 'array|required|max:4048|mimes:png,jpg,svg,webp,jpeg,jfif',
            "price" => "numeric|required|min:1",
            "is_available" => "numeric",
            "quantity" => "numeric|required",
            "description" => "string|required",
        ]);


        if (!$validation){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }

            $url = $this->request()->getUri();

            $this->redirect($url);
        }

        $imagesPath = "";
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

            $imagesPath = implode('|', $paths);
        }

        $inserted = $this->db()->insert("produkt", [
            "nazev" => $this->request()->input("title"),
            "kod" => $this->request()->input("code"),
            "obrazek" => $imagesPath,
            "cena" => $this->request()->input("price"),
            "popis" => $this->request()->input("description"),
            "dostupnost" => $this->request()->input("is_available"),
            "mnozstvi" => $this->request()->input("quantity"),
        ]);

        if ($inserted){
            $this->session()->set("inserted", "Produkt {$this->request()->input("title")} byl úspěšně přidán ");
        }else{
            $this->session()->set("dbfailed", "Při vkládání do databáze došlo k chybě");
        }

        $url = $this->request()->getUri();

        $this->redirect($url);




    }
}