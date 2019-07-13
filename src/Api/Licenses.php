<?php

namespace nickurt\OpenProvider\Api;

class Licenses extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createPleskLicense($params)
    {
        return $this->post(['createPleskLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createVirtuozzoLicense($params)
    {
        return $this->post(['createVirtuozzoLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deletePleskLicense($params)
    {
        return $this->post(['deletePleskLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteVirtuozzoLicense($params)
    {
        return $this->post(['deleteVirtuozzoLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyPleskLicense($params)
    {
        return $this->post(['modifyPleskLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyVirtuozzoLicense($params)
    {
        return $this->post(['modifyVirtuozzoLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resetLicenseHWID($params)
    {
        return $this->post(['resetLicenseHWID' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveKeyPleskLicense($params)
    {
        return $this->post(['retrieveKeyPleskLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveKeyVirtuozzoLicense($params)
    {
        return $this->post(['retrieveKeyVirtuozzoLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrievePleskLicense($params)
    {
        return $this->post(['retrievePleskLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveVirtuozzoLicense($params)
    {
        return $this->post(['retrieveVirtuozzoLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchPleskAndVirtuozzoItem($params)
    {
        return $this->post(['searchPleskAndVirtuozzoItemRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchPleskAndVirtuozzoLicense($params)
    {
        return $this->post(['searchPleskAndVirtuozzoLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchPleskLicense($params)
    {
        return $this->post(['searchPleskLicenseRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchVirtuozzoLicense($params)
    {
        return $this->post(['searchVirtuozzoLicenseRequest' => $params]);
    }
}