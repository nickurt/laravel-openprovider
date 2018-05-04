<?php

namespace nickurt\OpenProvider\Api;

class Customers extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createCustomer($params)
    {
        return $this->post(['createCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteCustomer($params)
    {
        return $this->post(['deleteCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyCustomer($params)
    {
        return $this->post(['modifyCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveCustomer($params)
    {
        return $this->post(['retrieveCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchCustomer($params)
    {
        return $this->post(['searchCustomerRequest' => $params]);
    }
}