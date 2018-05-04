<?php

namespace nickurt\OpenProvider\Api;

class NameServers extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createNs($params)
    {
        return $this->client->request(['createNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createTemplateDns($params)
    {
        return $this->client->request(['createTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createZoneDns($params)
    {
        return $this->client->request(['createZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteNs($params)
    {
        return $this->client->request(['deleteNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteTemplateDns($params)
    {
        return $this->client->request(['deleteTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteZoneDns($params)
    {
        return $this->client->request(['deleteZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyNs($params)
    {
        return $this->client->request(['modifyNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyZoneDns($params)
    {
        return $this->client->request(['modifyZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveNs($params)
    {
        return $this->client->request(['retrieveNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveTemplateDns($params)
    {
        return $this->client->request(['retrieveTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveZoneDns($params)
    {
        return $this->client->request(['retrieveZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchNs($params)
    {
        return $this->client->request(['searchNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchTemplateDns($params)
    {
        return $this->client->request(['searchTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchZoneDns($params)
    {
        return $this->client->request(['searchZoneDnsRequest' => $params]);
    }
}