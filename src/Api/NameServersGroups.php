<?php

namespace nickurt\OpenProvider\Api;

class NameServersGroups extends Operator
{
    /**
     * @param $params
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