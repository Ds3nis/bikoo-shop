<?php

namespace App\Kernel\Database;

interface DatabaseInterface
{
    public function insert(string $table, string $data);
    public function connect();
}