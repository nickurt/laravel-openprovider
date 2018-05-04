<?php

namespace nickurt\OpenProvider\Api;

use nickurt\OpenProvider\Client;
use \Spatie\ArrayToXml\ArrayToXml;

abstract class AbstractApi implements ApiInterface
{
    /**
     * @var Client
     */
    public $client;

    /**
     * AbstractApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function post($parameters)
    {
        $parameters = ArrayToXml::convert(array_merge([
            'credentials' => [
                'username' => $this->client->getHttpClient()->getOptions()['username'],
                'password' => $this->client->getHttpClient()->getOptions()['password'],
            ]
        ], $parameters), 'openXML');

        $response = $this->client->getHttpClient()->post(
            $parameters
        );

        return $response;
    }
}