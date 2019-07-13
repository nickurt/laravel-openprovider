<?php

namespace nickurt\OpenProvider;

use nickurt\OpenProvider\HttpClient\HttpClient;

/**
 * @method static \nickurt\OpenProvider\Api\Customers customers()
 */
class Client
{
    /**
     * @var
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $endpoints = [
        'live' => 'https://api.openprovider.eu',
        'cte' => 'https://api.cte.openprovider.eu'
    ];

    /**
     * @var
     */
    protected $environment;

    /**
     * @var array
     */
    protected $classes = [
        'customers' => 'Customers',
        'domains' => 'Domains',
        'emails' => 'Emails',
        'emailstemplates' => 'EmailsTemplates',
        'extensions' => 'Extensions',
        'financials' => 'Financials',
        'licenses' => 'Licenses',
        'nameservers' => 'NameServers',
        'nameserversgroups' => 'NameServersGroups',
        'resellers' => 'Resellers',
        'spamexperts' => 'SpamExperts',
        'ssl' => 'Ssl',
        'tags' => 'Tags',
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
        if(!isset($this->classes[$name])) {
            throw new \InvalidArgumentException(sprintf('Undefined method called:"%s"', $name));
        }

        $class = '\\nickurt\\OpenProvider\\Api\\' . $this->classes[$name];

        return new $class($this);
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return mixed
     */
    public function getEndpointUrl()
    {
        return $this->endpoints[($this->getEnvironment() == 'cte') ? 'cte' : 'live'];
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
            $this->httpClient->setOptions([
                'base_url' => $this->getEndpointUrl()
            ]);
        }

        $this->httpClient->setOptions([
            'base_url' => $this->getEndpointUrl()
        ]);

        return $this->httpClient;
    }
}