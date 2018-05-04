<?php

namespace nickurt\OpenProvider\Api;

class Emails extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function restartCustomerEmailVerification($params)
    {
        return $this->client->request(['restartCustomerEmailVerificationRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchEmailVerificationDomain($params)
    {
        return $this->client->request(['searchEmailVerificationDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function startCustomerEmailVerification($params)
    {
        return $this->client->request(['startCustomerEmailVerificationRequest' => $params]);
    }
}