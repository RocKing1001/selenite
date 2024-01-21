<?php

namespace service;

class RelayService
{
    private \repository\RelayRepository $repository;

    public function __construct()
    {
        $this->repository = new \repository\RelayRepository();
    }

    public function getRelayById(string $id): \model\Relay
    {
        return $this->repository->getById($id);
    }
}
