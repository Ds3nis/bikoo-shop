<?php

namespace App\Kernel\Database;




use App\Kernel\Config\ConfigInterface;

class Database implements DatabaseInterface
{

    private \PDO $pdo;
    public function __construct(private ConfigInterface $config){
        $this->connect();
    }

    public function insert(string $table, string $data){

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
}