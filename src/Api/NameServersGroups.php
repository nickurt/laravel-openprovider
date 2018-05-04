<?php

namespace nickurt\OpenProvider\Api;

class NameServersGroups extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createNsGroup($params)
    {
        return $this->post(['createNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteNsGroup($params)
    {
        return $this->post(['deleteNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyNsGroup($params)
    {
        return $this->post(['modifyNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveNsGroup($params)
    {
        return $this->post(['retrieveNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchNsGroup($params = [])
    {
        return $this->post(['searchNsGroupRequest' => $params]);
    }
}