<?php

namespace nickurt\OpenProvider\Api;

class NameServersGroups extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createNsGroup($params)
    {
        return $this->client->request(['createNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteNsGroup($params)
    {
        return $this->client->request(['deleteNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyNsGroup($params)
    {
        return $this->client->request(['modifyNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveNsGroup($params)
    {
        return $this->client->request(['retrieveNsGroupRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchNsGroup($params = [])
    {
        return $this->client->request(['searchNsGroupRequest' => $params]);
    }
}