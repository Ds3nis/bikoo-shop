<?php

namespace App\Middleware;

use App\Kernel\Middleware\AbstractMiddleware;

class AdminMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if ($this->auth->check() && $this->auth->user()->role() != 2){
            $this->redirect->to("/");
        }

    }
}