<?php

namespace App\Kernel\Auth;

use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{

    public function __construct(private DatabaseInterface $db, private SessionInterface $session, private ConfigInterface $config){

    }

    public function attempt(string $username, string $password): bool
    {
        $user = $this->db->first($this->table(), [
            $this->username() => $username
        ]);



        if (!$user){
            return  false;
        }

        if(! password_verify($password, $user[$this->password()])){
            return  false;
        }




        $this->session->set("user_id", $user["id"]);

        return true;
    }

    public function check(): bool
    {
        return $this->session->has("user-id");
    }

    public function logout(): void
    {
        $this->session->remove("user-id");
    }

    public function user(): ?array{
        if(!$this->check()){
            return  null;
        }

        return $this->db->first($this->table(), [
           "id" => $this->session->get("user-id"),
        ]);
    }


    public function table(): string
    {
        return $this->config->get("auth.table", "zakaznik");
    }

    public function username(): string
    {
        return $this->config->get("auth.username", "email");
    }

    public function password(): string
    {
        return $this->config->get("auth.password", "heslo");
    }
}