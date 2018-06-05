<?php

namespace nickurt\OpenProvider\Api;

class EmailsTemplates extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function createEmailTemplate($params)
    {
        return $this->post(['createEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function deleteEmailTemplate($params)
    {
        return $this->post(['deleteEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function modifyEmailTemplate($params)
    {
        return $this->post(['modifyEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function searchEmailTemplate($params)
    {
        return $this->post(['searchEmailTemplateRequest' => $params]);
    }
}