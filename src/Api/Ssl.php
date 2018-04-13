<?php

namespace nickurt\OpenProvider\Api;

class Ssl extends Operator
{
    /**
     * @param $params
     */
    public function retrieveProductSslCert($params)
    {
        return $this->client->request(['retrieveProductSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchProductSslCert($params = [])
    {
        return $this->client->request(['searchProductSslCertRequest' => $params]);
    }
}