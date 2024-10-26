<?php

namespace App\Controllers\Admin\Product;



use App\Kernel\Controller\Controller;

class StoreProductsController extends Controller
{
    public function store(){
        $validation = $this->request()->validate([
            "title" => ['required|min:3'],
        ]);



        if (!$validation){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }

            $url = $this->request()->getUri();
            $this->redirect($url);
        }

        dd("valdation passed");

    }
}