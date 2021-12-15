<?php

class Connection
{

    private mysqli $connection;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->connection = new mysqli($hostname, $username, $password, $database);
    }

    public function testConnection (): void
    {
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        var_dump("All good.");
    }

}