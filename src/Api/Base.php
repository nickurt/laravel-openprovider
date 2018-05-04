<?php

namespace nickurt\OpenProvider\Api;

use \Spatie\ArrayToXml\ArrayToXml;

class Base
{
    /**
     * @var
     */
    protected $host;

    /**
     * @var
     */
    protected $username;

    /**
     * @var
     */
    protected $password;

    /**
     * @return Customers
     */
    public function customers()
    {
        return new \nickurt\OpenProvider\Api\Customers($this);
    }

    /**
     * @return Domains
     */
    public function domains()
    {
        return new \nickurt\OpenProvider\Api\Domains($this);
    }

    /**
     * @return Emails
     */
    public function emails()
    {
        return new \nickurt\OpenProvider\Api\Emails($this);
    }

    /**
     * @return EmailsTemplates
     */
    public function emailstemplates()
    {
        return new \nickurt\OpenProvider\Api\EmailsTemplates($this);
    }

    /**
     * @return Extensions
     */
    public function extensions()
    {
        return new \nickurt\OpenProvider\Api\Extensions($this);
    }

    /**
     * @return Financials
     */
    public function financials()
    {
        return new \nickurt\OpenProvider\Api\Financials($this);
    }

    /**
     * @return Licenses
     */
    public function licenses()
    {
        return new \nickurt\OpenProvider\Api\Licenses($this);
    }

    /**
     * @return NameServers
     */
    public function nameservers()
    {
        return new \nickurt\OpenProvider\Api\NameServers($this);
    }

    /**
     * @return NameServersGroups
     */
    public function nameserversgroups()
    {
        return new \nickurt\OpenProvider\Api\NameServersGroups($this);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function request($params)
    {
        $response = (new \GuzzleHttp\Client())
            ->request('POST', $this->getHost(), [
                'body' => ArrayToXml::convert(array_merge([
                    'credentials' => [
                        'username' => $this->username,
                        'password' => $this->password,
                    ]
                ], $params), 'openXML')
            ]);

        return json_decode(json_encode(simplexml_load_string($response->getBody())), true);
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return Resellers
     */
    public function resellers()
    {
        return new \nickurt\OpenProvider\Api\Resellers($this);
    }

    /**
     * @param $username
     * @param $password
     */
    public function setCredentials($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return SpamExperts
     */
    public function spamexperts()
    {
        return new \nickurt\OpenProvider\Api\SpamExperts($this);
    }

    /**
     * @return Ssl
     */
    public function ssl()
    {
        return new \nickurt\OpenProvider\Api\Ssl($this);
    }

    /**
     * @return Tags
     */
    public function tags()
    {
        return new \nickurt\OpenProvider\Api\Tags($this);
    }
}