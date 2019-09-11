<?php

namespace nickurt\OpenProvider\HttpClient;

class HttpClient implements HttpClientInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        if (!isset($this->client)) {
            $this->client = new \GuzzleHttp\Client();

            return $this->client;
        }

        return $this->client;
    }

    /**
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @param array $body
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($body = [])
    {
        return $this->request($body, 'POST');
    }

    /**
     * @param $body
     * @param $method
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($body, $method)
    {
        $response = $this->getClient()->request(
            $method,
            $this->getOptions()['base_url'],
            [
                'headers' => $this->getHeaders(),
                'body' => $body
            ]
        );

        return json_decode(json_encode(simplexml_load_string($response->getBody())), true);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = array_merge($this->headers, $headers);
    }
}
