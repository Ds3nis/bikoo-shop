<?php

namespace App\Controllers\Checkout;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;

class StoreCheckoutController extends Controller
{
    public function store(){
        $orderService = new OrderService($this->db());
        $order_id = $this->session()->get("order_id");
        $validated = $this->request()->validate(
            [
                "name" => "required|min:3|max:45",
                "last_name" => "required|min:3|max:45",
                "email" => "required|email|max:100",
                "phone" => "required|min:12|maxNumeric:12",
                "city" => "required|string",
                "psc" => "required|numeric",
                "street" => "required|string",
                "home" => "required|numeric"
            ]
        );

        if (!$validated){
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error){
                $this->session()->set($field, $error);
            }
            $url = $this->request()->getUri();
            $this->redirect($url);
        }else{
            $name = $this->request()->input("name");
            $lastName = $this->request()->input("last_name");
            $fullName = $name . " " . $lastName;
            $phone = $this->request()->input("phone");
            $city = $this->request()->input("city");
            $psc = $this->request()->input("psc");
            $street = $this->request()->input("street");
            $home = $this->request()->input("home");

            $orderService->update($order_id, [
                "cele_jmeno" => $fullName,
                "telefon" => $phone,
                "mesto" => $city,
                "psc" => $psc,
                "ulice" => $street,
                "cislo_domu" => $home,
                "stav" => 1
            ]);

            $this->session()->remove("order_id");

            $this->redirect("/profile/orders");
        }
    }
}