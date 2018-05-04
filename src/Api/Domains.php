<?php

namespace nickurt\OpenProvider\Api;

class Domains extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function approveTransferDomain($params)
    {
        return $this->client->request(['approveTransferDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function checkDomain($params)
    {
        return $this->client->request(['checkDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createDomain($params)
    {
        return $this->client->request(['createDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteDomain($params)
    {
        return $this->client->request(['deleteDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyDomain($params)
    {
        return $this->client->request(['modifyDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function renewDomain($params)
    {
        return $this->client->request(['renewDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function requestAuthCodeDomain($params)
    {
        return $this->client->request(['requestAuthCodeDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function resetAuthCodeDomain($params)
    {
        return $this->client->request(['resetAuthCodeDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function restoreDomain($params)
    {
        return $this->client->request(['restoreDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveAdditionalDataDomain($params)
    {
        return $this->client->request(['retrieveAdditionalDataDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveCustomerAdditionalDataDomain($params)
    {
        return $this->client->request(['retrieveCustomerAdditionalDataDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveDomain($params)
    {
        return $this->client->request(['retrieveDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrievePriceDomain($params)
    {
        return $this->client->request(['retrievePriceDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchDomain($params)
    {
        return $this->client->request(['searchDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function sendFoa1Domain($params)
    {
        return $this->client->request(['sendFoa1DomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function tradeDomain($params)
    {
        return $this->client->request(['tradeDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function transferDomain($params)
    {
        return $this->client->request(['transferDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function tryAgainDomain($params)
    {
        return $this->client->request(['tryAgainDomainRequest' => $params]);
    }
}