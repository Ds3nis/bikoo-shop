<?php

namespace App\Kernel\Controller;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
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

    private AuthInterface $auth;

    /**
     * @return AuthInterface
     */
    public function auth(): AuthInterface
    {
        return $this->auth;
    }

    /**
     * @param AuthInterface $auth
     */
    public function setAuth(AuthInterface $auth): void
    {
        $this->auth = $auth;
    }

    private ConfigInterface $config;

    /**
     * @return ConfigInterface
     */
    public function config(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $cofig
     */
    public function setConfig(ConfigInterface $config): void
    {
        $this->config = $config;
    }



    private DatabaseInterface $database;

    public function setDatabase(DatabaseInterface $database){
        $this->database = $database;
    }

    public function db(){
        return $this->database;
    }

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

    public function abort($code = 404, $message = "Not Found")
    {
        http_response_code($code); // Встановлюємо HTTP-код відповіді

        // Підключення кастомної сторінки
        if ($code === 404) {
            extract(["view" => $this->view]);
            include APP_PATH . "/views/pages/notfound/404.php";
        } else {
            echo "<h1>Error $code</h1>";
            echo "<p>$message</p>";
        }

        exit; // Завершуємо виконання скрипта
    }

    private RequestInterface $request;

    public function validate(){

    }

    public function view(string $name, array $data = []){
        $this->view->page($name, $data);
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