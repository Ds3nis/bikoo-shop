<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;


class View
{

    public function page(string $name){

        extract([
            'view' => $this
        ]);

        $viewPath =  APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)){
            throw new ViewNotFoundException(message: "View $name not found");
        }else{
            include_once ($viewPath);
        }


    }

    public function component(string $name){

        $componentPath =  APP_PATH . "/views/components/$name.php";

        if (!file_exists($componentPath)){
            echo "Component $name not found";
            return;
        }else{
            include_once ($componentPath);

        }

    }

    public function include(string $name){

        $componentPath =  APP_PATH . "/views/pages/admin/includes/$name.php";
/*     dd($componentPath);*/
        if (!file_exists($componentPath)){
            echo "Component $name not found";
            return;
        }else{
            include_once ($componentPath);

        }

    }
}