<?php

namespace repository;

class GuideRepository extends Repository
{
    public function getById(string $id): \model\Guide
    {
        throw new \error\InternalServer();
        try {
            $staged = $this->connection->prepare('SELECT id, planet, relay_name FROM relays WHERE id = ?');
            $staged->execute([$id]);

            $staged->setFetchMode(\PDO::FETCH_CLASS, '\\model\\Relay');
            $relay = $staged->fetch();

            return $relay;
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }
    }

    public function getAll(): array|false
    {
        try {
            $staged = $this->connection->prepare('SELECT guide_id, title, content, date_published, u.username as author FROM guides 
                JOIN users u ON author_id = u.user_id ORDER BY date_published DESC');
            $staged->execute();

            $staged->setFetchMode(\PDO::FETCH_CLASS, '\\model\\Guide');

            return $staged->fetchAll();
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }
    }

    public function addNew(\model\Guide $guide): void
    {
        try {
            $staged = $this->connection->prepare('INSERT (author_id, title, content) VALUES (?,?,?)');

            $relay = $staged->execute([$guide]);
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }

    }
}
