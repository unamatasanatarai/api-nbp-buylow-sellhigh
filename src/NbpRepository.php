<?php

class NbpRepository
{

    private $dateRange;

    private $client;


    public function __construct(GatewayInterface $client, DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
        $this->client = $client;
    }


    public function load()
    {
        return $this->client->loadGoldDateRange($this->dateRange->getFrom(), $this->dateRange->getTo());
    }
}

