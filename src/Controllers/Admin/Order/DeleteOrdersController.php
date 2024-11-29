<?php

namespace App\Controllers\Admin\Order;

use App\Kernel\Controller\Controller;
use App\Services\OrderService;

class DeleteOrdersController extends Controller
{
    public function delete(){
        if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
            http_response_code(405);
            echo json_encode(['error' => 'Invalid request method']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $orderId = $data['order_id'] ?? '';
        $orderService = new OrderService($this->db());
        if (empty($orderId)) {
            http_response_code(405);
            echo json_encode(['error' => 'Order id is empty']);
            return;
        }


//        $isDeleted = $orderService->delete([
//            "id" => $orderId
//        ]);
//
//        if (!$isDeleted){
//            http_response_code(500);
//            $this->session()->set("fail-delete", "fail delete");
//            echo json_encode(['error' => 'Error']);
//            return;
//        }

        echo json_encode(['delete' => $orderId]);
        $this->session()->set("success-delete", "success");
        exit();
    }
}