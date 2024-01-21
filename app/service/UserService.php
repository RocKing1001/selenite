<?php

namespace service;

class UserService
{
    private \repository\UserRepository $repository;

    public function __construct()
    {
        $this->repository = new \repository\UserRepository();
    }

    public function hashPassAndRegister(string $email, string $pass): \model\User|false
    {
        $passHashed = $this->hash_password($pass);

        return $this->repository->addUser($email, $passHashed);
    }

    public function hashPassAndLogin(string $email, string $pass): \model\User|false
    {
        $passHashed = $this->hash_password($pass);

        return $this->repository->getUser($email, $passHashed);
    }

    public function deleteUser(string $uid, string $password): bool
    {
        return $this->repository->deleteUser($uid, $this->hash_password($password));

    }

    public function login(string $email, string $pass): \model\User|false
    {
        return $this->repository->getUser($email, $pass);
    }

    public function updateUsername(string $uid, string $username): void
    {
        $this->repository->updateUsername($uid, $username);
    }

    public function updatePassword(string $uid, string $old, string $password): void
    {
        $this->repository->updatePassword($uid, $this->hash_password($old), $this->hash_password($password));
    }

    private function hash_password(string $plain): string
    {
        return hash('sha256', $plain);
    }
}
