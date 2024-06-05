<?php

/**
 * Manages database connection and interactions
 */

namespace Core;

use Exception;
use PDO;
use PDOException;
use PDOStatement;

class Database
{

    public PDO $connection_db;
    public PDOStatement $statement;


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

    public function query($query, $params = []): static
    {
        $this->statement = $this->connection_db->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    /**
     * Fetch a single record from the database
     * @return mixed
     */
    public function find(): mixed
    {

        return $this->statement->fetch();
    }

    /**
     * Fetch a single record upon success or handle failure
     * @throws Exception
     */
    public function find_or_fail()
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::INTERNAL_SERVER_ERROR);
        }

        return $result;
    }

    /**
     * Fetch all the records from the database for a particular query.
     * @throws Exception
     */
    public function get(): false|array
    {
        $results = $this->statement->fetchAll();

        if (!$results) {
            abort(Response::INTERNAL_SERVER_ERROR);
        }

        return $results;
    }

}