<?php

namespace model;

class Relay
{
    private string $id;

    private string $planet;

    private string $relay_name;

    public function getPlanet(): string
    {
        return $this->planet;
    }

    public function getRelayName(): string
    {
        return $this->relay_name;
    }
}
