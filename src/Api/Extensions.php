<?php

namespace nickurt\OpenProvider\Api;

class Extensions extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveExtension($params)
    {
        return $this->post(['retrieveExtensionRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchExtension($params = [])
    {
        return $this->post(['searchExtensionRequest' => $params]);
    }
}