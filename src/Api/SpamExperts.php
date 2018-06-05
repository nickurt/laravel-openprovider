<?php

namespace nickurt\OpenProvider\Api;

class SpamExperts extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createDomainSe($params)
    {
        return $this->post(['createDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteDomainSe($params)
    {
        return $this->post(['deleteDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function generateSeLoginUrl($params)
    {
        return $this->post(['generateSeLoginUrlRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifyDomainSe($params)
    {
        return $this->post(['modifyDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveDomainSe($params)
    {
        return $this->post(['retrieveDomainSeRequest' => $params]);
    }
}