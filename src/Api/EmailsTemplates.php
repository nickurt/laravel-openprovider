<?php

namespace nickurt\OpenProvider\Api;

class EmailsTemplates extends Operator
{
    /**
     * @param $params
     * @return mixed
     */
    public function createEmailTemplate($params)
    {
        return $this->client->request(['createEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function deleteEmailTemplate($params)
    {
        return $this->client->request(['deleteEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function modifyEmailTemplate($params)
    {
        return $this->client->request(['modifyEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function searchEmailTemplate($params)
    {
        return $this->client->request(['searchEmailTemplateRequest' => $params]);
    }
}