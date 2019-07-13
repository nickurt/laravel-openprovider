<?php

namespace nickurt\OpenProvider\Tests;

use OpenProvider;
use Orchestra\Testbench\TestCase;

class OpenProviderTest extends TestCase
{
    /** @var \nickurt\OpenProvider\OpenProvider */
    protected $openProvider;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->openProvider = OpenProvider::getFacadeRoot();
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('openprovider.default', 'orchestra');

        $app['config']->set('openprovider.connections.orchestra', [
            'username' => 'emanresu',
            'password' => 'drowssap',
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'OpenProvider' => \nickurt\OpenProvider\Facade::class
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \nickurt\OpenProvider\ServiceProvider::class
        ];
    }

    /** @test */
    public function it_can_get_the_correct_live_endpoint_url()
    {
        $this->assertSame('https://api.openprovider.eu', $this->openProvider->getEndpointUrl());
    }

    /** @test */
    public function it_can_get_the_default_connection()
    {
        $this->assertSame('orchestra', $this->openProvider->getDefaultConnection());
    }

    /** @test */
    public function it_can_overrule_the_default_connenction_via_the_connection()
    {
        $this->app['config']->set('openprovider.connections.artsehcro', [
            'username' => 'drowssap',
            'password' => 'emanresu',
            'cte' => true,
        ]);

        $this->assertSame('orchestra', $this->openProvider->getDefaultConnection());

        $this->assertSame([
            'base_url' => 'https://api.cte.openprovider.eu',
            'username' => 'drowssap',
            'password' => 'emanresu',
        ], $this->openProvider->connection('artsehcro')->getHttpClient()->getOptions());
    }

    /** @test */
    public function it_can_work_with_helper_function()
    {
        $this->assertInstanceOf(\nickurt\OpenProvider\OpenProvider::class, openprovider());
    }
}