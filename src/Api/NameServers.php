<?php

namespace nickurt\OpenProvider\Api;

class NameServers extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createNs($params)
    {
        return $this->post(['createNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createTemplateDns($params)
    {
        return $this->post(['createTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createZoneDns($params)
    {
        return $this->post(['createZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteNs($params)
    {
        return $this->post(['deleteNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteTemplateDns($params)
    {
        return $this->post(['deleteTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteZoneDns($params)
    {
        return $this->post(['deleteZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifyNs($params)
    {
        return $this->post(['modifyNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifyZoneDns($params)
    {
        return $this->post(['modifyZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveNs($params)
    {
        return $this->post(['retrieveNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveTemplateDns($params)
    {
        return $this->post(['retrieveTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveZoneDns($params)
    {
        return $this->post(['retrieveZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchNs($params)
    {
        return $this->post(['searchNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchTemplateDns($params)
    {
        return $this->post(['searchTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchZoneDns($params)
    {
        return $this->post(['searchZoneDnsRequest' => $params]);
    }
}