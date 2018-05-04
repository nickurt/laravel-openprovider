<?php

namespace nickurt\OpenProvider\Api;

class Customers extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createCustomer($params)
    {
        return $this->client->request(['createCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteCustomer($params)
    {
        return $this->client->request(['deleteCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyCustomer($params)
    {
        return $this->client->request(['modifyCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveCustomer($params)
    {
        return $this->client->request(['retrieveCustomerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchCustomer($params)
    {
        return $this->client->request(['searchCustomerRequest' => $params]);
    }
}