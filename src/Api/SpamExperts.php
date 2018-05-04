<?php

namespace nickurt\OpenProvider\Api;

class SpamExperts extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDomainSe($params)
    {
        return $this->post(['createDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteDomainSe($params)
    {
        return $this->post(['deleteDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateSeLoginUrl($params)
    {
        return $this->post(['generateSeLoginUrlRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyDomainSe($params)
    {
        return $this->post(['modifyDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveDomainSe($params)
    {
        return $this->post(['retrieveDomainSeRequest' => $params]);
    }
}