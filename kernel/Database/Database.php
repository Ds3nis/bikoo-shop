<?php

namespace App\Kernel\Database;




use App\Kernel\Config\ConfigInterface;

class Database implements DatabaseInterface
{

    private \PDO $pdo;
    public function __construct(private ConfigInterface $config){
        $this->connect();
    }

    public function insert(string $table, $data){
        $fields = array_keys($data);

        $columns = implode(', ', $fields);

        $binds = implode(", ", array_map(fn($field) => ":$field", $fields));

        $sql = "INSERT INTO $table ($columns) VALUES ($binds)";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute($data);
            return [
                'success' => true,
                'id' => (int) $this->pdo->lastInsertId(),
                'message' => 'Data inserted successfully.',
            ];
        }catch (\PDOException $exception){
            return [
                'success' => false,
                'message' => 'Database error: ' . $exception->getMessage(),
            ];
        }


    }

    public function isUnique(string $table, string $field, string $value): bool
    {
        $sql = "SELECT COUNT(*) FROM $table WHERE $field = :value";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':value', $value);

        try {
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count == 0;
        } catch (\PDOException $exception) {
            return false;
        }
    }

    public function first(string $table, array $conditions = []): ?array
    {
        $where = "";

        if(count($conditions) > 0){
            $where = 'WHERE ' . implode(" AND ", array_map(fn($field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = "SELECT * FROM $table  $where LIMIT 1";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($conditions);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result == null){

        }


        return $result ?: null;
    }


    public function connect(){
        $driver = $this->config->get("database.driver");
        $host = $this->config->get("database.host");
        $dbname = $this->config->get("database.dbname");
        $port = $this->config->get("database.port");
        $username = $this->config->get("database.username");
        $password = $this->config->get("database.password");
        $charset = $this->config->get("database.charset");

        try {
            $this->pdo = new \PDO
            (
                "$driver:host=$host;port=$port; dbname=$dbname; charset=$charset",
                $username,
                $password
            );

        } catch (\PDOException $exception) {
            $errorMessage = $exception->getMessage();
            echo "Database connection failed: $errorMessage";
        }


    }

    public function get(string $table, array $conditions = [], array $order = [], int $limit = -1, int $offset = 0, string $separator = "AND"): ?array
    {
        $where = '';

        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $field => $condition) {
                if (is_array($condition)) {
                    // Підтримка, наприклад, ["nazev" => ["LIKE", "%search%"]]
                    $operator = $condition[0];
                    $value = $condition[1];
                    $whereClauses[] = "$field $operator :$field";
                    $conditions[$field] = $value;
                } else {
                    // Звичайне порівняння
                    $whereClauses[] = "$field = :$field";
                }
            }
            $where = 'WHERE ' . implode(" {$separator} ", $whereClauses);
        }


        $sql = "SELECT * FROM $table $where";
        if (count($order) > 0){
            $sql .= ' ORDER BY '.implode(", ", array_map(fn($field, $direction) => "$field $direction", array_keys($order), $order));
        }

        if ($limit > 0){
            $sql .= " LIMIT {$limit}";
        }

        if ($offset > 0){
            $sql .= " OFFSET {$offset}";
        }


        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($conditions);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getSpecial(string $table, array $conditions): ?array
    {
        $whereClauses = [];
        $orClauses = [];
        $params = [];

        foreach ($conditions as $field => $condition) {
            if (is_array($condition)) {
                // Наприклад, ["nazev" => ["LIKE", "%search%"]] або ["nazev" => ["LIKE", "%search%", "OR"]]
                $operator = $condition[0];
                $value = $condition[1];
                $logicalSeparator = $condition[2] ?? "AND"; // За замовчуванням "AND"

                if (strtoupper($logicalSeparator) === "OR") {
                    $orClauses[] = "$field $operator :$field";
                } else {
                    $whereClauses[] = "$field $operator :$field";
                }

                $params[$field] = $value;
            } else {
                $whereClauses[] = "$field = :$field";
                $params[$field] = $condition;
            }
        }


        $orPart = '';
        if (!empty($orClauses)) {
            $orPart = '(' . implode(' OR ', $orClauses) . ')';
        }

        $wherePart = implode(' AND ', $whereClauses);
        if ($wherePart && $orPart) {
            $wherePart .= " AND $orPart";
        } elseif ($orPart) {
            $wherePart = $orPart;
        }

        $where = $wherePart ? "WHERE $wherePart" : '';

        $sql = "SELECT * FROM $table $where";



        $stmt = $this->pdo->prepare($sql);
        $isSelected = $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }




    public function delete(string $table, array $conditions = []){

        $where = "";

        if(count($conditions) > 0){
            $where = 'WHERE ' . implode(" AND ", array_map(fn($field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = "DELETE FROM $table $where";

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute($conditions);
            return [
                'success' => true,
                'id' => (int) $this->pdo->lastInsertId(),
                'message' => 'Data deleted successfully.',
            ];
        }catch (\PDOException $exception){
            return [
                'success' => false,
                'id' => (int) $this->pdo->lastInsertId(),
                'message' => 'Database error: ' . $exception->getMessage(),
            ];
        }
    }

    public function update(string $table, array $data, array $conditions = []): bool
    {
        $fields = array_keys($data);

        $set = implode(", ", array_map(fn ($field) => "$field = :$field" , $fields));

        $where = '';

        if(!empty($conditions)){
            $where = 'WHERE ' . implode(" AND ", array_map(fn($field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = "UPDATE $table SET $set $where";
//        dd($sql);
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array_merge($data, $conditions));

        return $stmt->rowCount() > 0;
    }


}