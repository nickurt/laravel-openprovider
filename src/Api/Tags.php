<?php

namespace nickurt\OpenProvider\Api;

class Tags extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createTag($params)
    {
        return $this->client->request(['createTagRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteTag($params)
    {
        return $this->client->request(['deleteTagRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchTagRequest($params)
    {
        return $this->client->request(['searchTagRequest' => $params]);
    }
}