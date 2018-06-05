<?php

namespace nickurt\OpenProvider\Api;

class Tags extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createTag($params)
    {
        return $this->post(['createTagRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteTag($params)
    {
        return $this->post(['deleteTagRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchTagRequest($params)
    {
        return $this->post(['searchTagRequest' => $params]);
    }
}