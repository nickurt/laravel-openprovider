<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

use PHPUnit\Framework\TestCase;

abstract class BaseEndpointTest extends TestCase
{
    /** @var \GuzzleHttp\Client */
    protected $httpClient;

    /** @var \nickurt\OpenProvider\Client */
    protected $openProvider;

    /**
     * @param \GuzzleHttp\Psr7\Response $expectedResponse
     */
    public function mockApiClientResponse(\GuzzleHttp\Psr7\Response $expectedResponse)
    {
        $this->httpClient = $this->createMock(\GuzzleHttp\Client::class);

        $this->openProvider = new \nickurt\OpenProvider\Client();
        $this->openProvider->setCredentials('username', 'password');
        $this->openProvider->getHttpClient()->setClient($this->httpClient);

        $this->httpClient->method('request')->willReturn($expectedResponse);
    }
}