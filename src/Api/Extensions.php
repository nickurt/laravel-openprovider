<?php

namespace nickurt\OpenProvider\Api;

class Extensions extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function retrieveExtension($params)
    {
        return $this->client->request(['retrieveExtensionRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchExtension($params = [])
    {
        return $this->client->request(['searchExtensionRequest' => $params]);
    }
}