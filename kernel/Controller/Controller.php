<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Request;
use App\Kernel\View\View;

abstract class Controller
{
    private View $view;

    private Request $request;

    public function view(string $name){
        $this->view->page($name);
    }

    /**
     * @param View $view
     * @return Controller
     */
    public function setView(View $view)
    {
        $this->view = $view;
    }

    /**
     * @return Request
     */
    public function request(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     * @return Controller
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }
}