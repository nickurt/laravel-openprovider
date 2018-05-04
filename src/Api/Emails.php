<?php

namespace nickurt\OpenProvider\Api;

class Emails extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function restartCustomerEmailVerification($params)
    {
        return $this->post(['restartCustomerEmailVerificationRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchEmailVerificationDomain($params)
    {
        return $this->post(['searchEmailVerificationDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function startCustomerEmailVerification($params)
    {
        return $this->post(['startCustomerEmailVerificationRequest' => $params]);
    }
}