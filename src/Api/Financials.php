<?php

namespace nickurt\OpenProvider\Api;

class Financials extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function searchInvoiceReseller($params = [])
    {
        return $this->client->request(['searchInvoiceResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchPaymentReseller($params)
    {
        return $this->client->request(['searchPaymentResellerRequest' => $params]);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function searchTransactionReseller($params = [])
    {
        return $this->client->request(['searchTransactionResellerRequest' => $params]);
    }
}