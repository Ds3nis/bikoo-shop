<?php

namespace App\Kernel\Database;

interface DatabaseInterface
{
    public function insert(string $table, string $data);
    public function connect();
    public function delete(string $table, array $conditions = []);
    public function get(string $table, array $conditions = [], array $order = [], int $limit = -1, int $offset = 0, string $separator = "AND") : ?array;

    public function getSpecial(string $table, array $conditions) : ?array;

    public function first(string $table, array $conditions = []): ?array;
    public function isUnique(string $table, string $field, string $value) : bool;
    public function update(string $table, array $data, array $conditions = []) : bool;
}