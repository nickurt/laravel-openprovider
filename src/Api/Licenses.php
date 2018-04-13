<?php

namespace nickurt\OpenProvider\Api;

class Licenses extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function retrieveProductLicense($params)
    {
        return $this->client->request(['retrieveProductLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchProductLicense($params = [])
    {
        return $this->client->request(['searchProductLicenseRequest' => $params]);
    }
}