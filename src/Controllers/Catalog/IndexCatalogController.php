<?php

namespace App\Controllers\Catalog;

use App\Kernel\Controller\Controller;
use App\Services\ProductService;
use App\Pagination\Pagination;

class IndexCatalogController extends Controller
{
    public function index(): void {
        $service = new ProductService($this->db());
        $available = $this->request()->input("available");
        $sortBy = $this->request()->input("sort_by");
        $query = $this->request()->input("query");
        $page = $this->request()->input("page") ?? 1;
        $perPage = 1;

        $conditions = [];
        if (!empty($available)) {
            $conditions["dostupnost"] = 1;
        }

        // Додаємо пошук за назвою товару
        if (isset($query) && !empty($query)) {
            $conditions["nazev"] = ["LIKE", "%" . $query . "%"];
        }

        $order = [];
        switch ($sortBy) {
            case 'alphabetical':
                $order = ["nazev" => "ASC"];
                break;
            case 'price_asc':
                $order = ["cena" => "ASC"];
                break;
            case 'price_desc':
                $order = ["cena" => "DESC"];
                break;
            default:
                $order = ["id" => "ASC"];
                break;
        }

        $productCount = count($service->all($conditions, $order));

        $pagination = new Pagination((int)$page, $perPage, $productCount);
        $start = $pagination->getStart();
        $paginationHtml = $pagination->getHtml();
        $products = $service->all($conditions, $order, $perPage, $start);

        $this->view("/catalog/products", [
            "products" => $products,
            "pagination" => $paginationHtml,
            "query" => $query,
            "sortBy" => $sortBy
        ]);
    }

}