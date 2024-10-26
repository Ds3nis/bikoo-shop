<?php

namespace App\Kernel\Session;

interface SessionInterface
{
    public function set(string $key, $value);
    public function getFlash(string $key);
    public function has(string $key);
    public function get(string $key, $default = null);
    public function remove(string $key);
    public function getSession();
    public function destroy();
}