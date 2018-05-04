<?php

namespace nickurt\OpenProvider;

use nickurt\OpenProvider\HttpClient\HttpClient;

class Client
{
    /**
     * @var
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $options = [
        'base_url' => 'https://api.openprovider.eu'
    ];

    /**
     * @param $method
     * @param $args
     * @return Api\Customers|Api\Domains|Api\Emails|Api\EmailsTemplates|Api\Extensions|Api\Financials|Api\Licenses
     */
    public function __call($method, $args)
    {
        try {
            return $this->api($method);
        } catch (InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called:"%s"', $method));
        }
    }

    /**
     * @param $name
     * @return Api\Customers|Api\Domains|Api\Emails|Api\EmailsTemplates|Api\Extensions|Api\Financials|Api\Licenses
     */
    public function api($name)
    {
        switch ($name) {
            case 'customers':
                $api = new \nickurt\OpenProvider\Api\Customers($this);
                break;
            case 'domains':
                $api = new \nickurt\OpenProvider\Api\Domains($this);
                break;
            case 'emails':
                $api = new \nickurt\OpenProvider\Api\Emails($this);
                break;
            case 'emailstemplates':
                $api = new \nickurt\OpenProvider\Api\EmailsTemplates($this);
                break;
            case 'extensions':
                $api = new \nickurt\OpenProvider\Api\Extensions($this);
                break;
            case 'financials':
                $api = new \nickurt\OpenProvider\Api\Financials($this);
                break;
            case 'licenses':
                $api = new \nickurt\OpenProvider\Api\Licenses($this);
                break;
            case 'nameservers':
                $api = new \nickurt\OpenProvider\Api\NameServers($this);
                break;
            case 'nameserversgroups':
                $api = new \nickurt\OpenProvider\Api\NameServersGroups($this);
                break;
            case 'resellers':
                $api = new \nickurt\OpenProvider\Api\Resellers($this);
                break;
            case 'spamexperts':
                $api = new \nickurt\OpenProvider\Api\SpamExperts($this);
                break;
            case 'ssl':
                $api = new \nickurt\OpenProvider\Api\Ssl($this);
                break;
            case 'tags':
                $api = new \nickurt\OpenProvider\Api\Tags($this);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Undefined method called:"%s"', $name));
                break;
        }

        return $api;
    }

    /**
     * @param $username
     * @param $password
     */
    public function setCredentials($username, $password)
    {
        $this->getHttpClient()->setOptions([
            'username' => $username,
            'password' => $password
        ]);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!isset($this->httpClient)) {
            $this->httpClient = new HttpClient();
            $this->httpClient->setOptions($this->options);
        }

        return $this->httpClient;
    }
}