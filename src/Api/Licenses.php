<?php

namespace nickurt\OpenProvider\Api;

class Licenses extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createLicense($params)
    {
        return $this->post(['createLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteLicense($params)
    {
        return $this->post(['deleteLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function editLicense($params)
    {
        return $this->post(['editLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveKeyLicense($params)
    {
        return $this->post(['retrieveKeyLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveLicense($params)
    {
        return $this->post(['retrieveLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveProductLicense($params)
    {
        return $this->post(['retrieveProductLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchLicense($params)
    {
        return $this->post(['searchLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchProductLicense($params = [])
    {
        return $this->post(['searchProductLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upgradeLicense($params)
    {
        return $this->post(['upgradeLicenseRequest' => $params]);
    }
}