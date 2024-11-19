<?php

namespace App\Middleware;

use App\Kernel\Middleware\AbstractMiddleware;

class SuperAdminMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if (!$this->auth->check()){
            $this->redirect->to("/");
        }elseif ($this->auth->check() && $this->auth->user()->role() < 3){
            $this->redirect->to("/");
        }
    }
}