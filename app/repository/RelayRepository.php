<?php

namespace repository;

class RelayRepository extends Repository
{
    public function getById(string $id): \model\Relay
    {
        try {
            $staged = $this->connection->prepare("SELECT id, planet, relay_name FROM relays WHERE id = ?");
            $staged->execute([$id]);

            $staged->setFetchMode(\PDO::FETCH_CLASS, '\\model\\Relay');
            $relay = $staged->fetch();

            return $relay;
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }
    }
}
