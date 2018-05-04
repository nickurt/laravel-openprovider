<?php

namespace nickurt\OpenProvider\Api;

class Ssl extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function cancelSslCert($params)
    {
        return $this->client->request(['cancelSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function changeApproverEmailAddressSslCert($params)
    {
        return $this->client->request(['changeApproverEmailAddressSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createSslCert($params)
    {
        return $this->client->request(['createSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function decodeCsrSslCert($params)
    {
        return $this->client->request(['decodeCsrSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function generateCsrSslCert($params)
    {
        return $this->client->request(['generateCsrSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function generateOtpTokenSslCert($params)
    {
        return $this->client->request(['generateOtpTokenSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifySslCert($params)
    {
        return $this->client->request(['modifySslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function reissueSslCert($params)
    {
        return $this->client->request(['reissueSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function renewSslCert($params)
    {
        return $this->client->request(['renewSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function resendApproverEmailSslCert($params)
    {
        return $this->client->request(['resendApproverEmailSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveApproverEmailListSslCert($params)
    {
        return $this->client->request(['retrieveApproverEmailListSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveOrderSslCert($params)
    {
        return $this->client->request(['retrieveOrderSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveProductSslCert($params)
    {
        return $this->client->request(['retrieveProductSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchOrderSslCert($params)
    {
        return $this->client->request(['searchOrderSslCertRequest' => $params]);
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