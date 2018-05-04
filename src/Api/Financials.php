<?php

namespace nickurt\OpenProvider\Api;

class Financials extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchInvoiceReseller($params = [])
    {
        return $this->post(['searchInvoiceResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchPaymentReseller($params)
    {
        return $this->post(['searchPaymentResellerRequest' => $params]);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchTransactionReseller($params = [])
    {
        return $this->post(['searchTransactionResellerRequest' => $params]);
    }
}