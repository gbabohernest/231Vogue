<?php

/**
 * Manages database connection and interactions
 */

class Database
{

    public PDO $connection_db;

    public function __construct(array $config, array $options)
    {

        $username = $options['username'] ?? 'root';
        $password = $options['password'] ?? '';


        $dsn = 'mysql:' . http_build_query($config, '', ';');


        try {
            $this->connection_db = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            echo 'Error, Unable to connect ' . $e->getMessage();

        }

    }

    public function query($query): false|PDOStatement
    {
        $statement = $this->connection_db->prepare($query);

        $statement->execute();

        return $statement;
    }
}