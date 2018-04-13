<?php

namespace nickurt\OpenProvider\Api;

class Domains extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function retreiveDomain($params)
    {
        return $this->client->request(['retrieveDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchDomain($params)
    {
        $params = ['offset' => 0, 'limit' => 1, 'status' => 'ACT'];

        return $this->client->request(['searchDomainRequest' => $params]);
    }
}