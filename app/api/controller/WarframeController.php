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

        //undocumented official api
        //I moved on to using a community maintained api which has same features but
        //more documented
        //$url = 'https://content.warframe.com/dynamic/worldState.php';

        // fetch worldstate data
        $url = 'https://api.warframestat.us/pc/';

        $jsonString = file_get_contents($url);

        $fetchedData = json_decode($jsonString);

        $dateTime = new \DateTime($fetchedData->voidTraders[0]->activation);
        $baroTimeMilliseconds = $dateTime->getTimestamp() * 1000;
        $baroTimeReadable = date('jS M', $dateTime->getTimestamp());

        //$relayId = $fetchedData->VoidTraders[0]->Node;

        // this
        // $relay = $this->service->getRelayById('SaturnHUB');
        $relay = $fetchedData->voidTraders[0]->location;

        $data = [
            'baro' => [
                'time' => $baroTimeReadable,
                'relay' => $relay,
            ],
            'cetus' => $fetchedData->cetusCycle,
            'fortuna' => $fetchedData->vallisCycle,
            'deimos' => $fetchedData->cambionCycle,
        ];

        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data);
        exit;
    }
}
