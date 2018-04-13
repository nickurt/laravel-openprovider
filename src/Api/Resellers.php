<?php

namespace nickurt\OpenProvider\Api;

class Resellers extends Operator
{
    /**
     * @param $params
     */
    public function retrieveReseller()
    {
        return $this->client->request(['retrieveResellerRequest' => $params]);
    }
}