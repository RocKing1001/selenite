<?php
namespace api\controller;

class IndexController
{
    private \service\RelayService $service;

    public function __construct()
    {
        $data = [
            // not server status
            // this is a joke
            // sarcasam module needed to proceed
            'alive' => 'no',

            // php version to make sure php did not
            // unalive , which it might being so elderly
            'php_version' => phpversion(),
        ];
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data);
    }
}
