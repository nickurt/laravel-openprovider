<?php

namespace nickurt\OpenProvider\Api;

class Ssl extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function cancelSslCert($params)
    {
        return $this->post(['cancelSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function changeApproverEmailAddressSslCert($params)
    {
        return $this->post(['changeApproverEmailAddressSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createSslCert($params)
    {
        return $this->post(['createSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function decodeCsrSslCert($params)
    {
        return $this->post(['decodeCsrSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function generateCsrSslCert($params)
    {
        return $this->post(['generateCsrSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function generateOtpTokenSslCert($params)
    {
        return $this->post(['generateOtpTokenSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifySslCert($params)
    {
        return $this->post(['modifySslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function reissueSslCert($params)
    {
        return $this->post(['reissueSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function renewSslCert($params)
    {
        return $this->post(['renewSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function resendApproverEmailSslCert($params)
    {
        return $this->post(['resendApproverEmailSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveApproverEmailListSslCert($params)
    {
        return $this->post(['retrieveApproverEmailListSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveOrderSslCert($params)
    {
        return $this->post(['retrieveOrderSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function retrieveProductSslCert($params)
    {
        return $this->post(['retrieveProductSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchOrderSslCert($params)
    {
        return $this->post(['searchOrderSslCertRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchProductSslCert($params = [])
    {
        return $this->post(['searchProductSslCertRequest' => $params]);
    }
}