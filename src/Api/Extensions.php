<?php

namespace nickurt\OpenProvider\Api;

class Extensions extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveExtension($params)
    {
        return $this->post(['retrieveExtensionRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchExtension($params = [])
    {
        return $this->post(['searchExtensionRequest' => $params]);
    }
}