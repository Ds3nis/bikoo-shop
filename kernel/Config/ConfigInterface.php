<?php

namespace App\Kernel\Config;

interface ConfigInterface
{
    public function get($key ,$default = null) : mixed;
}