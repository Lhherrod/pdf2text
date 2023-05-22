<?php

declare(strict_types=1);

namespace Core;

class Database
{
    public \PDO $conn;
    public object $stmt;

    public function __construct(array $config)
    {
        $dsn = ('mysql:' . http_build_query($config, arg_separator: ';'));
        $this->conn = new \PDO($dsn, $config['dbuser'], $config['dbpass'], [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query,  array $params = []): object
    {
        $this->stmt = $this->conn->prepare($query);

        $this->stmt->execute($params);

        return $this;
    }

    public function find(): array | bool
    {
        return $this->stmt->fetch();
    }

    public function findOrFail(): array
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }

    public function get(): array
    {
        return $this->stmt->fetchAll();
    }
}