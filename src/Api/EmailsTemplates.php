<?php

namespace nickurt\OpenProvider\Api;

class EmailsTemplates extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createEmailTemplate($params)
    {
        return $this->post(['createEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteEmailTemplate($params)
    {
        return $this->post(['deleteEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyEmailTemplate($params)
    {
        return $this->post(['modifyEmailTemplateRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchEmailTemplate($params)
    {
        return $this->post(['searchEmailTemplateRequest' => $params]);
    }
}