<?php

namespace nickurt\OpenProvider\Api;

class Customers extends Operator
{
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
        $params = ['offset' => 0, 'limit' => 10];

        return $this->client->request(['searchCustomerRequest' => $params]);
    }
}