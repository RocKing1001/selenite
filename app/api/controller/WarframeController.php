<?php

namespace api\controller;

class WarframeController
{
    private \service\RelayService $service;

    public function __construct()
    {
        $this->service = new \service\RelayService();

        $this->response();

    }

    private function response(): void
    {
        // fetch worldstate data
        $url = 'https://content.warframe.com/dynamic/worldState.php';
        $jsonString = file_get_contents($url);

        $fetchedData = json_decode($jsonString);

        $baroTime = (int) $fetchedData->VoidTraders[0]->Activation->{'$date'}->{'$numberLong'} / 1000;
        $baroTimeReadable = date('jS M', $baroTime);

        $relayId = $fetchedData->VoidTraders[0]->Node;

        $relay = $this->service->getRelayById($relayId);

        $data = [
            'php_version' => phpversion(),
            'baro' => [
                'time' => $baroTimeReadable,
                'relay' => $relay->getRelayName().' ('.$relay->getPlanet().')',
            ],
        ];

        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data);
        exit;
    }
}
