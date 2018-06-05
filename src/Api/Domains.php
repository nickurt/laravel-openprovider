<?php

namespace nickurt\OpenProvider\Api;

class Domains extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function approveTransferDomain($params)
    {
        return $this->post(['approveTransferDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function checkDomain($params)
    {
        return $this->post(['checkDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createDomain($params)
    {
        return $this->post(['createDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteDomain($params)
    {
        return $this->post(['deleteDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifyDomain($params)
    {
        return $this->post(['modifyDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function renewDomain($params)
    {
        return $this->post(['renewDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function requestAuthCodeDomain($params)
    {
        return $this->post(['requestAuthCodeDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function resetAuthCodeDomain($params)
    {
        return $this->post(['resetAuthCodeDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function restoreDomain($params)
    {
        return $this->post(['restoreDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveAdditionalDataDomain($params)
    {
        return $this->post(['retrieveAdditionalDataDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveCustomerAdditionalDataDomain($params)
    {
        return $this->post(['retrieveCustomerAdditionalDataDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveDomain($params)
    {
        return $this->post(['retrieveDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrievePriceDomain($params)
    {
        return $this->post(['retrievePriceDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchDomain($params)
    {
        return $this->post(['searchDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function sendFoa1Domain($params)
    {
        return $this->post(['sendFoa1DomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function tradeDomain($params)
    {
        return $this->post(['tradeDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function transferDomain($params)
    {
        return $this->post(['transferDomainRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function tryAgainDomain($params)
    {
        return $this->post(['tryAgainDomainRequest' => $params]);
    }
}