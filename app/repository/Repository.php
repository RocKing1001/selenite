<?php

namespace repository;

abstract class Repository
{
    protected \PDO $connection;

    public function __construct()
    {
        require __DIR__.'/../dbconfig.php';

        try {
            $this->connection = new \PDO("$type:host=$servername;dbname=$database", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // We will not send the actual error to the client
            // for all we know, the error could be some issue with openssl
            // and might dump all our secrets out to the client
            // instead we send a 500, which can then be diagnosed by the dev
            throw new \error\InternalServer();
        }
    }
}
