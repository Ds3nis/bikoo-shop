<?php

namespace App\Pagination;

class Pagination
{
    public int $count_pages = 1;
    public int $current_page = 1;
    public string $uri = "";
    public int $all_pages = 7;

    public function __construct(
        public int $page = 1,
        public int $per_page = 1,
        public int $total = 1
    ){
        $this->count_pages = $this->getCountPages();
        $this->current_page = $this->getCurrentPage();
        $this->uri = $this->getParams();
    }

    public function getCountPages() : int{
        return ceil($this->total / $this->per_page) ?: 1;
    }

    public function getCurrentPage() :int{
        if ($this->page < 1) {
            $this->page = 1;
        }
        if ($this->page > $this->count_pages){
            $this->page = $this->count_pages;
        }

        return $this->page;
    }


    public function getStart() : int{
        return ($this->current_page - 1) * $this->per_page;
    }

    public function getParams() : string{
        $url = $_SERVER["REQUEST_URI"];
        $url = explode("?", $url);
        $uri = $url[0];

        if (isset($url[1]) && $url[1] != ""){
           $uri .= '?';
           $params = explode("&", $url[1]);
           foreach ($params as $param){
               if (!str_contains($param, "page=")){
                   $uri .= "{$param}&";
               }
           }
        }
        return $uri;
    }

    public function getHtml() : string
    {
        $back = '';
        $forward = '';
        $pages = '';
        $html = '';

        // Стрілка «назад»
        if ($this->current_page > 1) {
            $back ="<li class='page-item'><a class='page-link' href='" . $this->getLink($this->current_page - 1) . "'>&lt;</a></li>";
//                "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->current_page - 1) . "'>&lt;</a></li>";
        }

        // Стрілка «вперед»
        if ($this->current_page < $this->count_pages) {
            $forward = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->current_page + 1) . "'>&gt;</a></li>";
        }

        // Номери сторінок
        $start = max(1, $this->current_page - floor($this->all_pages / 2));
        $end = min($this->count_pages, $start + $this->all_pages - 1);

        if ($start > 1) {
            $pages .= "<li class='page-item'><a class='page-link' href='{$this->uri}page=1'>1</a></li>";
            if ($start > 2) {
                $pages .= "<li class='page-item disabled'><span class='page-link'>...</span></li>";
            }
        }

        for ($i = $start; $i <= $end; $i++) {
            if ($i == $this->current_page) {
                $pages .= "<li class='page-item active'><a class='page-link'>{$i}</a></li>";
            } else {
                $pages .= "<li class='page-item'><a class='page-link' href='" . $this->getLink($i) . "'>{$i}</a></li>";
            }
        }

        if ($end < $this->count_pages) {
            if ($end < $this->count_pages - 1) {
                $pages .= "<li class='page-item disabled'><span class='page-link'>...</span></li>";
            }
            $pages .= "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->count_pages) . "'>{$this->count_pages}</a></li>";
        }

        // Об'єднання всіх частин HTML
        $html .= "<nav aria-label='Page navigation'><ul class='pagination'>";
        $html .= $back . $pages . $forward;
        $html .= "</ul></nav>";

        return $html;
    }

    public function getLink($page) : string{
        if ($page == 1){
            return rtrim($this->uri, '?&');
        }

         if (str_contains($this->uri, "&") || str_contains($this->uri, "?")){
             return "{$this->uri}page={$page}";
         }else{
             return "{$this->uri}?page={$page}";
         }

    }




}