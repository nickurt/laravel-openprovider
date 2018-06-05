<?php

namespace nickurt\OpenProvider\Api;

class Customers extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createCustomer($params)
    {
        return $this->post(['createCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteCustomer($params)
    {
        return $this->post(['deleteCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifyCustomer($params)
    {
        return $this->post(['modifyCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveCustomer($params)
    {
        return $this->post(['retrieveCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchCustomer($params)
    {
        return $this->post(['searchCustomerRequest' => $params]);
    }
}