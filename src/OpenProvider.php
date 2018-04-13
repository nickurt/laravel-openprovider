<?php

namespace nickurt\OpenProvider;

class OpenProvider
{
    /**
     * @var
     */
    protected $app;

    /**
     * @var array
     */
    protected $connections = [];

    /**
     * @var
     */
    protected $client;

    /**
     * OpenProvider constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->base, $method], $args);
    }

    /**
     * @param null $name
     * @return Api\Client
     */
    public function connection($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();

        return $this->connections[$name] = $this->get($name);
    }

    /**
     * @return mixed
     */
    public function getDefaultConnection()
    {
        return $this->app['config']['openprovider.default'];
    }

    /**
     * @param $name
     * @return Api\Client
     */
    protected function get($name)
    {
        return $this->connections[$name] ?? $this->resolve($name);
    }

    /**
     * @param $name
     * @return Api\Base
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        $this->base =  new \nickurt\OpenProvider\Api\Base();
        $this->base->setHost($config['host']);
        $this->base->setCredentials(
            $config['username'],
            $config['password']
        );

        return $this->base;
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function getConfig($name)
    {
        return $this->app['config']["openprovider.connections.{$name}"];
    }
}
