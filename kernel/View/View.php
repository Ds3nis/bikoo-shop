<?php

namespace App\Kernel\View;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;


class View implements ViewInterface
{

    public function __construct(private SessionInterface $session, private AuthInterface $auth){

    }

    public function page(string $name, array $data = []){

        extract(array_merge([
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ], $data));

        $viewPath =  APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)){
            throw new ViewNotFoundException(message: "View $name not found");
        }else{
            include_once ($viewPath);
        }


    }

    public function component(string $name, array $info = []){
        $componentPath =  APP_PATH . "/views/components/$name.php";
        extract(array_merge([
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ], $info));

        if (!file_exists($componentPath)){
            echo "Component $name not found";
            return;
        }else{
            include ($componentPath);

        }

    }

    public function defaultData() : array{
        return [
            'view' => $this,
            "session" => $this->session
        ];
    }

    public function include(string $name, array $data = []){

        $componentPath =  APP_PATH . "/views/pages/admin/includes/$name.php";
/*     dd($componentPath);*/
        extract(array_merge([
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ], $data));
        if (!file_exists($componentPath)){
            echo "Component $name not found";
            return;
        }else{
            include_once ($componentPath);

        }

    }
}