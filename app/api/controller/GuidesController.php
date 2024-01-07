<?php

namespace api\controller;

class GuidesController
{
    private \service\GuideService $service;

    public function __construct()
    {
        $this->service = new \service\GuideService();

        $this->response();
    }

    private function response(): void {

        $fetched = $this->service->getAllGuides();
        
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($fetched);
        exit;
    }
}
