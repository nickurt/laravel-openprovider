<?php

namespace nickurt\OpenProvider\Api;

class Resellers extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createContactReseller($params)
    {
        return $this->client->request(['createContactResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteContactReseller($params)
    {
        return $this->client->request(['deleteContactResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyContactReseller($params)
    {
        return $this->client->request(['modifyContactResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyReseller($params)
    {
        return $this->client->request(['modifyResellerRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function retrieveContactReseller($params)
    {
        return $this->client->request(['retrieveContactResellerRequest' => $params]);
    }

    /**
     * @return mixed
     */
    public function retrieveReseller()
    {
        return $this->client->request(['retrieveResellerRequest' => []]);
    }

    /**
     * @return mixed
     */
    public function retrieveSettingsReseller()
    {
        return $this->client->request(['retrieveSettingsResellerRequest' => []]);
    }

    /**
     * @return mixed
     */
    public function retrieveStatisticsReseller()
    {
        return $this->client->request(['retrieveStatisticsResellerRequest' => []]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchContactReseller($params)
    {
        return $this->client->request(['searchContactResellerRequest' => $params]);
    }
}