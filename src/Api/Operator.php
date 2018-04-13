<?php

namespace nickurt\OpenProvider\Api;

class Operator
{
    public $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}