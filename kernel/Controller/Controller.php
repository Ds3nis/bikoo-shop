<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\Request;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Validator\ValidatorInterface;
use App\Kernel\View\View;
use App\Kernel\Validator\Validator;
use App\Kernel\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;

    private ValidatorInterface $validate;

    private SessionInterface $session;

    public function setSession(SessionInterface $session) : void{
        $this->session = $session;
    }

    public function session() : SessionInterface{
        return $this->session;
    }

    private RedirectInterface $redirect;

    /**
     * @param Redirect $redirect
     */
    public function setRedirect(RedirectInterface $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function redirect(string $url){
        $this->redirect->to($url);
    }

    private RequestInterface $request;

    public function validate(){

    }

    public function view(string $name){
        $this->view->page($name);
    }

    /**
     * @param View $view
     * @return Controller
     */
    public function setView(ViewInterface $view)
    {
        $this->view = $view;
    }

    /**
     * @return Request
     */
    public function request(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @param Request $request
     * @return Controller
     */
    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }
}