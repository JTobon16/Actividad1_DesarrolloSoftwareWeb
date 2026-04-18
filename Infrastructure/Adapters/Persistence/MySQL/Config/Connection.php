<?php

declare(strict_types=1);

namespace Infrastructure\Adapters\Persistence\MySQL\Config;

use PDO;
use PDOException;

class Connection
{
    private string $host;
    private int $port;
    private string $database;
    private string $user;
    private string $password;

    public function __construct(
        string $host,
        int $port,
        string $database,
        string $user,
        string $password
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
    }

    public function createPdo(): PDO
    {
        try {
            return new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            throw new \RuntimeException("Error de conexión: " . $e->getMessage());
        }
    }
}
