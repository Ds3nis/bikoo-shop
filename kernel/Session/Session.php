<?php

namespace App\Kernel\Session;

class Session implements SessionInterface
{

    public function __construct()
    {
            session_start();
    }

    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function getFlash(string $key)
    {
        $value = $_SESSION[$key] ?? null;
        $this->remove($key);

        return $value;
    }

    public function has(string $key)
    {
        return isset($_SESSION[$key]);
    }

    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }

    public function getSession()
    {
        return $_SESSION;
    }

    public function destroy()
    {
        session_destroy();
    }
}

