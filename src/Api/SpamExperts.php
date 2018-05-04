<?php

namespace nickurt\OpenProvider\Api;

class SpamExperts extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createDomainSe($params)
    {
        return $this->client->request(['createDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteDomainSe($params)
    {
        return $this->client->request(['deleteDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function generateSeLoginUrl($params)
    {
        return $this->client->request(['generateSeLoginUrlRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyDomainSe($params)
    {
        return $this->client->request(['modifyDomainSeRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveDomainSe($params)
    {
        return $this->client->request(['retrieveDomainSeRequest' => $params]);
    }
}