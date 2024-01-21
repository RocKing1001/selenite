<?php

namespace repository;

class UserRepository extends Repository
{
    private \service\UserService $service;

    public function getUser(string $email, string $pass): \model\User|false
    {
        try {
            $staged = $this->connection->prepare('SELECT user_id, email, username, pfp FROM users WHERE email = ? AND pass = ?');
            $staged->execute([$email, $pass]);

            $staged->setFetchMode(\PDO::FETCH_CLASS, '\\model\\User');
            $relay = $staged->fetch();

            return $relay;
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }
    }

    public function addUser(string $email, string $pass): \model\User|false
    {

        try {
            $staged = $this->connection->prepare('INSERT INTO users (email, pass, username, pfp) VALUES (?, ?, ?, ?)');
            $staged->execute([$email, $pass, 'Anonymous', 'Default']);

            // if it gets modified, then we fetch the new user and return it
            if ($staged->rowCount() > 0) {
                return $this->getUser($email, $pass);
            }

        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }
    }

    public function deleteUser(string $uid, string $pass): bool
    {
        try {
            $staged = $this->connection->prepare('DELETE FROM users WHERE user_id = ? AND pass = ?');
            var_dump([$uid, $pass]);
            $staged->execute([$uid, $pass]);

            return $staged->rowCount() > 0;
        } catch (\Exception $e) {
            echo $e->getMessage();
            throw new \error\InternalServer();
        }

    }

    public function updateUsername(string $uid, string $username): void
    {
        try {
            $staged = $this->connection->prepare('UPDATE users SET username = ? WHERE user_id = ?');
            $staged->execute([$username, $uid]);
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }
    }

    public function updatePassword(string $uid, string $old, string $password): void
    {
        try {
            $staged = $this->connection->prepare('UPDATE users SET pass = ? WHERE user_id = ? AND pass = ?');
            $staged->execute([$password, $uid, $old]);

            if ($staged->rowCount() <= 0) {
                throw new \error\InternalServer();
            }
        } catch (\Exception $e) {
            throw new \error\InternalServer();
        }

    }
}
