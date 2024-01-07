<?php

namespace service;

class GuideService
{
    private \repository\GuideRepository $repository;

    public function __construct()
    {
        $this->repository = new \repository\GuideRepository();
    }

    public function getGuideById(string $id): \model\Guide {
        return $this->repository->getById($id);
    }

    public function getAllGuides(): array|false {
        return $this->repository->getAll();
    }

}
