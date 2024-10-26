<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page(string $name);
    public function component(string $name);
    public function defaultData() : array;
    public function include(string $name);
}