<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class NameServersTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_ns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $nameServer = $this->openProvider->nameservers()->createNs([
            'name' => 'glue-ns1.openprovider.com',
            'ip' => '93.180.69.5',
            'ip6' => '2a00:f10:11f::5'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $nameServer);
    }

    /** @test */
    public function it_can_do_a_create_template_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>5936</data></reply></openXML>'));

        $template = $this->openProvider->nameservers()->createTemplateDns([
            'name' => 'Demo',
            'records' => [
                [
                    'type' => 'A',
                    'name' => "",
                    'value' => '89.255.0.43',
                    'ttl' => 86400
                ],
                [
                    'type' => 'A',
                    'name' => '*',
                    'value' => '89.255.0.43',
                    'ttl' => 86400
                ],
                [
                    'type' => 'MX',
                    'name' => "",
                    'value' => 'mail.%domain%',
                    'prio' => 10,
                    'ttl' => 86400
                ]
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '5936']], $template);
    }

    /** @test */
    public function it_can_do_a_create_zone_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $zone = $this->openProvider->nameservers()->createZoneDns([
            'domain' => [
                'name' => 'demozone',
                'extension' => 'com'
            ],
            'type' => 'master',
            'records' => [
                [
                    'type' => 'A',
                    'name' => "",
                    'value' => '89.255.0.43',
                    'ttl' => 86400
                ],
                [
                    'type' => 'A',
                    'name' => '*',
                    'value' => '89.255.0.43',
                    'ttl' => 86400
                ],
                [
                    'type' => 'MX',
                    'name' => "",
                    'value' => 'mail.openprovider.eu',
                    'prio' => 10,
                    'ttl' => 86400
                ]
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $zone);
    }

    /** @test */
    public function it_can_do_a_delete_ns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $nameServer = $this->openProvider->nameservers()->deleteNs([
            'name' => 'glue-ns1.openprovider.com'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $nameServer);
    }

    /** @test */
    public function it_can_do_a_delete_template_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $template = $this->openProvider->nameservers()->deleteTemplateDns([
            'id' => 5562,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $template);
    }

    /** @test */
    public function it_can_do_a_delete_zone_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $zone = $this->openProvider->nameservers()->deleteZoneDns([
            'domain' => [
                'name' => 'demozone',
                'extension' => 'com'
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $zone);
    }

    /** @test */
    public function it_can_do_a_modify_ns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $nameServer = $this->openProvider->nameservers()->modifyNs([
            'name' => 'glue-ns1.openprovider.com',
            'ip' => '93.180.69.6',
            'ip6' => '2a00:f10:11f::6'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $nameServer);
    }

    /** @test */
    public function it_can_do_a_modify_zone_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $zone = $this->openProvider->nameservers()->modifyZoneDns([
            'domain' => [
                'name' => 'demozone',
                'extension' => 'com'
            ],
            'records' => [
                [
                    'type' => 'A',
                    'name' => "",
                    'value' => '89.255.0.43',
                    'ttl' => 86400
                ],
                [
                    'type' => 'A',
                    'name' => '*',
                    'value' => '89.255.0.43',
                    'ttl' => 86400
                ],
                [
                    'type' => 'MX',
                    'name' => "",
                    'value' => 'mail.openprovider.eu',
                    'prio' => 10,
                    'ttl' => 86400
                ]
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $zone);
    }

    /** @test */
    public function it_can_do_a_retrieve_ns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><name>glue-ns1.openprovider.com</name><ip>93.180.69.5</ip><ip6>2a00:f10:11f::5</ip6></data></reply></openXML>'));

        $nameServer = $this->openProvider->nameservers()->retrieveNs([
            'name' => 'glue-ns1.openprovider.com'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['name' => 'glue-ns1.openprovider.com', 'ip' => '93.180.69.5', 'ip6' => '2a00:f10:11f::5']]], $nameServer);
    }

    /** @test */
    public function it_can_do_a_retrieve_template_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>5562</id><name>Default</name><records><array><item><id>63581</id><name></name><type>A</type><value>213.193.110.246</value><ttl>86400</ttl><priority>0</priority></item><item><id>63583</id><name>intranet</name><type>A</type><value>1.0.0.0</value><ttl>86400</ttl><priority>0</priority></item><item><id>63582</id><name>mail</name><type>A</type><value>213.193.110.246</value><ttl>86400</ttl><priority>0</priority></item><item><id>63584</id><name>www</name><type>CNAME</type><value>%domain%</value><ttl>86400</ttl><priority>0</priority></item><item><id>63585</id><name></name><type>MX</type><value>mail.%domain%</value><ttl>86400</ttl><priority>123</priority></item><item><id>63586</id><name></name><type>SPF</type><value>"v=spf1 a mx ip4:77.74.50.63 ~all"</value><ttl>86400</ttl><priority>0</priority></item></array></records></data></reply></openXML>'));

        $template = $this->openProvider->nameservers()->retrieveTemplateDns([
            'id' => 5562,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '5562', 'name' => 'Default', 'records' => ['array' => ['item' => [0 => ['id' => '63581', 'name' => [], 'type' => 'A', 'value' => '213.193.110.246', 'ttl' => '86400', 'priority' => '0'], 1 => ['id' => '63583', 'name' => 'intranet', 'type' => 'A', 'value' => '1.0.0.0', 'ttl' => '86400', 'priority' => '0'], 2 => ['id' => '63582', 'name' => 'mail', 'type' => 'A', 'value' => '213.193.110.246', 'ttl' => '86400', 'priority' => '0'], 3 => ['id' => '63584', 'name' => 'www', 'type' => 'CNAME', 'value' => '%domain%', 'ttl' => '86400', 'priority' => '0'], 4 => ['id' => '63585', 'name' => [], 'type' => 'MX', 'value' => 'mail.%domain%', 'ttl' => '86400', 'priority' => '123'], 5 => ['id' => '63586', 'name' => [], 'type' => 'SPF', 'value' => '"v=spf1 a mx ip4:77.74.50.63 ~all"', 'ttl' => '86400', 'priority' => '0']]]]]]], $template);
    }

    /** @test */
    public function it_can_do_a_retrieve_zone_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>48890</id><type>master</type><name>demozone.com</name><ip>com.demozone</ip><active>1</active><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate><records><array><item><name>*.demozone.com</name><type>A</type><value>89.255.0.43</value><prio></prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item><item><name>demozone.com</name><type>A</type><value>89.255.0.43</value><prio></prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item><item><name>demozone.com</name><type>MX</type><value>mail.openprovider.eu</value><prio>10</prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item><item><name>demozone.com</name><type>NS</type><value>ns3.openprovider.eu</value><prio></prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item><item><name>demozone.com</name><type>NS</type><value>ns1.openprovider.nl</value><prio></prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item><item><name>demozone.com</name><type>NS</type><value>ns2.openprovider.be</value><prio></prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item><item><name>demozone.com</name><type>SOA</type><value>ns1.openprovider.nl dns@openprovider.eu 2010071300</value><prio></prio><ttl>86400</ttl><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item></array></records><history><array><item><date>2010-07-13 17:07:22</date><is>+ A |demozone.com | 89.255.0.43</is><was></was></item><item><date>2010-07-13 17:07:22</date><is>+ A |*.demozone.com | 89.255.0.43</is><was></was></item><item><date>2010-07-13 17:07:22</date><is>+ MX |demozone.com | mail.openprovider.eu</is><was></was></item><item><date>2010-07-13 17:07:22</date><is>+ NS |demozone.com | ns3.openprovider.eu</is><was></was></item><item><date>2010-07-13 17:07:22</date><is>+ NS |demozone.com | ns1.openprovider.nl</is><was></was></item><item><date>2010-07-13 17:07:22</date><is>+ NS |demozone.com | ns2.openprovider.be</is><was></was></item><item><date>2010-07-13 17:07:22</date><is>+ SOA |demozone.com | ns1.openprovider.nl dns@openprovider.eu 2010071300</is><was></was></item></array></history></data></reply></openXML>'));

        $zone = $this->openProvider->nameservers()->retrieveZoneDns([
            'name' => 'demozone.com',
            'withRecords' => 1,
            'withHistory' => 1
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '48890', 'type' => 'master', 'name' => 'demozone.com', 'ip' => 'com.demozone', 'active' => '1', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22', 'records' => ['array' => ['item' => [0 => ['name' => '*.demozone.com', 'type' => 'A', 'value' => '89.255.0.43', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22'], 1 => ['name' => 'demozone.com', 'type' => 'A', 'value' => '89.255.0.43', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22'], 2 => ['name' => 'demozone.com', 'type' => 'MX', 'value' => 'mail.openprovider.eu', 'prio' => '10', 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22'], 3 => ['name' => 'demozone.com', 'type' => 'NS', 'value' => 'ns3.openprovider.eu', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22'], 4 => ['name' => 'demozone.com', 'type' => 'NS', 'value' => 'ns1.openprovider.nl', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22'], 5 => ['name' => 'demozone.com', 'type' => 'NS', 'value' => 'ns2.openprovider.be', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22'], 6 => ['name' => 'demozone.com', 'type' => 'SOA', 'value' => 'ns1.openprovider.nl dns@openprovider.eu 2010071300', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22']]]], 'history' => ['array' => ['item' => [0 => ['date' => '2010-07-13 17:07:22', 'is' => '+ A |demozone.com | 89.255.0.43', 'was' => []], 1 => ['date' => '2010-07-13 17:07:22', 'is' => '+ A |*.demozone.com | 89.255.0.43', 'was' => []], 2 => ['date' => '2010-07-13 17:07:22', 'is' => '+ MX |demozone.com | mail.openprovider.eu', 'was' => []], 3 => ['date' => '2010-07-13 17:07:22', 'is' => '+ NS |demozone.com | ns3.openprovider.eu', 'was' => []], 4 => ['date' => '2010-07-13 17:07:22', 'is' => '+ NS |demozone.com | ns1.openprovider.nl', 'was' => []], 5 => ['date' => '2010-07-13 17:07:22', 'is' => '+ NS |demozone.com | ns2.openprovider.be', 'was' => []], 6 => ['date' => '2010-07-13 17:07:22', 'is' => '+ SOA |demozone.com | ns1.openprovider.nl dns@openprovider.eu 2010071300', 'was' => []]]]]]]], $zone);
    }

    /** @test */
    public function it_can_do_a_search_ns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><name>glue-ns1.openprovider.com</name><ip>93.180.69.5</ip><ip6>2a00:f10:11f::5</ip6></item><item><name>glue-ns2.openprovider.com</name><ip>93.180.69.1</ip><ip6>2a00:f10:11f::1</ip6></item></array></results><total>2</total></data></reply></openXML>'));

        $nameServer = $this->openProvider->nameservers()->searchNs([
            'pattern' => '*openprovider.com'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['name' => 'glue-ns1.openprovider.com', 'ip' => '93.180.69.5', 'ip6' => '2a00:f10:11f::5'], 1 => ['name' => 'glue-ns2.openprovider.com', 'ip' => '93.180.69.1', 'ip6' => '2a00:f10:11f::1']]]], 'total' => '2']]], $nameServer);
    }

    /** @test */
    public function it_can_do_a_search_template_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><id>5120</id><name>Corporate Redirect</name><records><array><item><id>63573</id><name></name><type>A</type><value>213.193.220.146</value><ttl>86400</ttl><priority>0</priority></item><item><id>63574</id><name>www</name><type>CNAME</type><value>%domain%</value><ttl>86400</ttl><priority>0</priority></item></array></records></item><item><id>5562</id><name>Default</name><records><array><item><id>63581</id><name></name><type>A</type><value>213.193.110.246</value><ttl>86400</ttl><priority>0</priority></item><item><id>63583</id><name>intranet</name><type>A</type><value>1.0.0.0</value><ttl>86400</ttl><priority>0</priority></item><item><id>63582</id><name>mail</name><type>A</type><value>213.193.110.246</value><ttl>86400</ttl><priority>0</priority></item><item><id>63584</id><name>www</name><type>CNAME</type><value>%domain%</value><ttl>86400</ttl><priority>0</priority></item><item><id>63585</id><name></name><type>MX</type><value>mail.%domain%</value><ttl>86400</ttl><priority>123</priority></item><item><id>63586</id><name></name><type>SPF</type><value>"v=spf1 a mx ip4:77.74.50.63 ~all"</value><ttl>86400</ttl><priority>0</priority></item></array></records></item><item><id>5936</id><name>Demo</name><records><array><item><id>63602</id><name></name><type>A</type><value>89.255.0.43</value><ttl>86400</ttl><priority>0</priority></item><item><id>63603</id><name>*</name><type>A</type><value>89.255.0.43</value><ttl>86400</ttl><priority>0</priority></item><item><id>63604</id><name></name><type>MX</type><value>mail.%domain%</value><ttl>86400</ttl><priority>10</priority></item></array></records></item><item><id>5638</id><name>Shared Hosting</name><records><array><item><id>63587</id><name></name><type>A</type><value>89.255.0.46</value><ttl>86400</ttl><priority>0</priority></item><item><id>63589</id><name>mail</name><type>A</type><value>89.255.0.53</value><ttl>86400</ttl><priority>0</priority></item><item><id>63588</id><name>www</name><type>A</type><value>89.255.0.46</value><ttl>86400</ttl><priority>0</priority></item><item><id>63591</id><name>ftp</name><type>CNAME</type><value>%domain%</value><ttl>86400</ttl><priority>0</priority></item><item><id>63592</id><name>webmail</name><type>CNAME</type><value>%domain%</value><ttl>86400</ttl><priority>0</priority></item><item><id>63590</id><name></name><type>MX</type><value>mail.%domain%</value><ttl>86400</ttl><priority>10</priority></item></array></records></item></array></results><total>4</total></data></reply></openXML>'));

        $template = $this->openProvider->nameservers()->searchTemplateDns([
            //
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['id' => '5120', 'name' => 'Corporate Redirect', 'records' => ['array' => ['item' => [0 => ['id' => '63573', 'name' => [], 'type' => 'A', 'value' => '213.193.220.146', 'ttl' => '86400', 'priority' => '0'], 1 => ['id' => '63574', 'name' => 'www', 'type' => 'CNAME', 'value' => '%domain%', 'ttl' => '86400', 'priority' => '0']]]]], 1 => ['id' => '5562', 'name' => 'Default', 'records' => ['array' => ['item' => [0 => ['id' => '63581', 'name' => [], 'type' => 'A', 'value' => '213.193.110.246', 'ttl' => '86400', 'priority' => '0'], 1 => ['id' => '63583', 'name' => 'intranet', 'type' => 'A', 'value' => '1.0.0.0', 'ttl' => '86400', 'priority' => '0'], 2 => ['id' => '63582', 'name' => 'mail', 'type' => 'A', 'value' => '213.193.110.246', 'ttl' => '86400', 'priority' => '0'], 3 => ['id' => '63584', 'name' => 'www', 'type' => 'CNAME', 'value' => '%domain%', 'ttl' => '86400', 'priority' => '0'], 4 => ['id' => '63585', 'name' => [], 'type' => 'MX', 'value' => 'mail.%domain%', 'ttl' => '86400', 'priority' => '123'], 5 => ['id' => '63586', 'name' => [], 'type' => 'SPF', 'value' => '"v=spf1 a mx ip4:77.74.50.63 ~all"', 'ttl' => '86400', 'priority' => '0']]]]], 2 => ['id' => '5936', 'name' => 'Demo', 'records' => ['array' => ['item' => [0 => ['id' => '63602', 'name' => [], 'type' => 'A', 'value' => '89.255.0.43', 'ttl' => '86400', 'priority' => '0'], 1 => ['id' => '63603', 'name' => '*', 'type' => 'A', 'value' => '89.255.0.43', 'ttl' => '86400', 'priority' => '0'], 2 => ['id' => '63604', 'name' => [], 'type' => 'MX', 'value' => 'mail.%domain%', 'ttl' => '86400', 'priority' => '10']]]]], 3 => ['id' => '5638', 'name' => 'Shared Hosting', 'records' => ['array' => ['item' => [0 => ['id' => '63587', 'name' => [], 'type' => 'A', 'value' => '89.255.0.46', 'ttl' => '86400', 'priority' => '0'], 1 => ['id' => '63589', 'name' => 'mail', 'type' => 'A', 'value' => '89.255.0.53', 'ttl' => '86400', 'priority' => '0'], 2 => ['id' => '63588', 'name' => 'www', 'type' => 'A', 'value' => '89.255.0.46', 'ttl' => '86400', 'priority' => '0'], 3 => ['id' => '63591', 'name' => 'ftp', 'type' => 'CNAME', 'value' => '%domain%', 'ttl' => '86400', 'priority' => '0'], 4 => ['id' => '63592', 'name' => 'webmail', 'type' => 'CNAME', 'value' => '%domain%', 'ttl' => '86400', 'priority' => '0'], 5 => ['id' => '63590', 'name' => [], 'type' => 'MX', 'value' => 'mail.%domain%', 'ttl' => '86400', 'priority' => '10']]]]]]]], 'total' => '4']]], $template);
    }

    /** @test */
    public function it_can_do_a_search_zone_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><id>48890</id><type>master</type><name>demozone.com</name><ip>89.255.0.43</ip><active>1</active><creationDate>2010-07-13 17:07:22</creationDate><modificationDate>2010-07-13 17:07:22</modificationDate></item></array></results><total>1</total></data></reply></openXML>'));

        $zone = $this->openProvider->nameservers()->searchZoneDns([
            'namePattern' => '%demo%'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['id' => '48890', 'type' => 'master', 'name' => 'demozone.com', 'ip' => '89.255.0.43', 'active' => '1', 'creationDate' => '2010-07-13 17:07:22', 'modificationDate' => '2010-07-13 17:07:22']]], 'total' => '1']]], $zone);
    }

    /** @test */
    public function it_can_do_a_search_zone_record_dns_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><desc></desc><data><results><array><item><id>502647110</id><name>demozone.nl</name><type>MX</type><value>123.demozone.nl</value><prio>5</prio><ttl>86400</ttl><creationDate>2017-07-18 05:54:36</creationDate><modificationDate>2017-07-18 05:54:36</modificationDate></item><item><id>529669018</id><name>demozone.nl</name><type>CNAME</type><value>google.com</value><prio></prio><ttl>3600</ttl><creationDate>2017-09-14 10:09:09</creationDate><modificationDate>2017-09-14 10:09:09</modificationDate></item><item><id>516713902</id><name>www.demozone.nl</name><type>A</type><value>8.8.8.8</value><prio></prio><ttl>86400</ttl><creationDate>2017-08-18 08:15:10</creationDate><modificationDate>2017-08-18 08:15:10</modificationDate></item></array></results><total>12</total></data></reply></openXML>'));

        $zone = $this->openProvider->nameservers()->searchZoneRecordDns([
            'name' => 'demozone.com',
            'offset' => 5,
            'limit' => 3,
            'orderBy' => 'name',
        ]);

        $this->assertSame(['reply' => ['desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['id' => '502647110', 'name' => 'demozone.nl', 'type' => 'MX', 'value' => '123.demozone.nl', 'prio' => '5', 'ttl' => '86400', 'creationDate' => '2017-07-18 05:54:36', 'modificationDate' => '2017-07-18 05:54:36'], 1 => ['id' => '529669018', 'name' => 'demozone.nl', 'type' => 'CNAME', 'value' => 'google.com', 'prio' => [], 'ttl' => '3600', 'creationDate' => '2017-09-14 10:09:09', 'modificationDate' => '2017-09-14 10:09:09'], 2 => ['id' => '516713902', 'name' => 'www.demozone.nl', 'type' => 'A', 'value' => '8.8.8.8', 'prio' => [], 'ttl' => '86400', 'creationDate' => '2017-08-18 08:15:10', 'modificationDate' => '2017-08-18 08:15:10']]]], 'total' => '12']]], $zone);
    }
}
