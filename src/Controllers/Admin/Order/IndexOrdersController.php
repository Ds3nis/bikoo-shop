<?php

namespace App\Controllers\Admin\Order;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;
use App\Models\Order;

class IndexOrdersController extends Controller
{

    public function index(){
        $orderService = new OrderService($this->db());

        $conditions = [
            "stav" => [">", "1"],
        ];


        $orders = $orderService->getOrdersStatus($conditions);


        $this->view("/admin/orders/index", [
            "orders" => $orders
        ]);
    }


    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Invalid request method']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $searchQuery = $data['search'] ?? '';
        $orderService = new OrderService($this->db());
        if (empty($searchQuery)) {
            $coditions = [
                "stav" => [">", "1"]
            ];
            $orders = $orderService->getOrdersStatus($coditions);
        }else{
            $conditions = [
                "stav" => [">=", "2", "AND"],
                "id" => ["LIKE", "%" . $searchQuery . "%", "OR"],
                "cele_jmeno" => ["LIKE", "%" . $searchQuery . "%", "OR"],
                "datum" => ["LIKE", "%" . $searchQuery . "%", "OR"],
            ];

            $orders = $orderService->getOrdersStatus($conditions);

        }
        $orderArray = array_map(function ($order) {
            return $order->toArray();
        }, $orders);

        echo json_encode(['orders' => $orderArray]);
        exit();
    }


}