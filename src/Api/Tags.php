<?php

namespace nickurt\OpenProvider\Api;

class Tags extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createTag($params)
    {
        return $this->post(['createTagRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteTag($params)
    {
        return $this->post(['deleteTagRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchTag($params)
    {
        return $this->post(['searchTagRequest' => $params]);
    }
}