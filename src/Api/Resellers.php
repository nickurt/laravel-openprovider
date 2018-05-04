<?php

namespace nickurt\OpenProvider\Api;

class Resellers extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createContactReseller($params)
    {
        return $this->post(['createContactResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteContactReseller($params)
    {
        return $this->post(['deleteContactResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyContactReseller($params)
    {
        return $this->post(['modifyContactResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyReseller($params)
    {
        return $this->post(['modifyResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveContactReseller($params)
    {
        return $this->post(['retrieveContactResellerRequest' => $params]);
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveReseller()
    {
        return $this->post(['retrieveResellerRequest' => []]);
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveSettingsReseller()
    {
        return $this->post(['retrieveSettingsResellerRequest' => []]);
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveStatisticsReseller()
    {
        return $this->post(['retrieveStatisticsResellerRequest' => []]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchContactReseller($params)
    {
        return $this->post(['searchContactResellerRequest' => $params]);
    }
}