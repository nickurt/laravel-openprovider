<?php

namespace nickurt\OpenProvider\Api;

class Licenses extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createLicense($params)
    {
        return $this->client->request(['createLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteLicense($params)
    {
        return $this->client->request(['deleteLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function editLicense($params)
    {
        return $this->client->request(['editLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveKeyLicense($params)
    {
        return $this->client->request(['retrieveKeyLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveLicense($params)
    {
        return $this->client->request(['retrieveLicenseRequest' => $params]);
    }

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
    public function searchLicense($params)
    {
        return $this->client->request(['searchLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchProductLicense($params = [])
    {
        return $this->client->request(['searchProductLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function upgradeLicense($params)
    {
        return $this->client->request(['upgradeLicenseRequest' => $params]);
    }
}