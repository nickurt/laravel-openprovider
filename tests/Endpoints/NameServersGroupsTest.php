<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class NameServersGroupsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_ns_group_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $group = $this->openProvider->nameserversgroups()->createNsGroup([
            'nsGroup' => 'server-tux',
            'nameServers' => [
                ['name' => 'ns1.openprovider.nl', 'ip' => '89.255.7.30', 'ip6' => '2a01:d078:0:147:94:198:153:68'],
                ['name' => 'ns2.openprovider.be', 'ip' => '89.255.6.30', 'ip6' => '20f1:610:0:800d::15'],
            ]
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $group);
    }

    /** @test */
    public function it_can_do_a_delete_ns_group_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $group = $this->openProvider->nameserversgroups()->deleteNsGroup([
            'nsGroup' => 'server-tux',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $group);
    }

    /** @test */
    public function it_can_do_a_modify_ns_group_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $group = $this->openProvider->nameserversgroups()->modifyNsGroup([
            'nsGroup' => 'server-tux',
            'nameServers' => [
                ['name' => 'ns1.openprovider.nl', 'ip' => '89.255.7.30'],
                ['name' => 'ns2.openprovider.be', 'ip' => '89.255.6.30'],
                ['name' => 'ns3.openprovider.eu', 'ip' => '80.95.170.252'],
            ]
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $group);
    }

    /** @test */
    public function it_can_do_a_retrieve_ns_group_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><nameServers><array><item><name>ns1.openprovider.nl</name><ip>89.255.7.30</ip></item><item><name>ns2.openprovider.be</name><ip>89.255.6.30</ip></item></array></nameServers><nsGroup>server-tux</nsGroup><nsCount>3</nsCount></data></reply></openXML>'));

        $group = $this->openProvider->nameserversgroups()->retrieveNsGroup([
            'nsGroup' => 'server-tux',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['nameServers' => ['array' => ['item' => [0 => ['name' => 'ns1.openprovider.nl', 'ip' => '89.255.7.30'], 1 => ['name' => 'ns2.openprovider.be', 'ip' => '89.255.6.30']]]], 'nsGroup' => 'server-tux', 'nsCount' => '3']]], $group);
    }

    /** @test */
    public function it_can_do_a_search_ns_group_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><nameServers><array><item><name>ns1.openprovider.nl</name><ip>89.255.7.30</ip></item><item><name>ns2.openprovider.be</name><ip>89.255.6.30</ip></item><item><name>ns3.openprovider.eu</name><ip>80.95.170.252</ip></item></array></nameServers><nsGroup>server-tux</nsGroup><nsCount>3</nsCount></item></array></results><total>1</total></data></reply></openXML>'));

        $group = $this->openProvider->nameserversgroups()->searchNsGroup([
            //
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['nameServers' => ['array' => ['item' => [0 => ['name' => 'ns1.openprovider.nl', 'ip' => '89.255.7.30'], 1 => ['name' => 'ns2.openprovider.be', 'ip' => '89.255.6.30'], 2 => ['name' => 'ns3.openprovider.eu', 'ip' => '80.95.170.252']]]], 'nsGroup' => 'server-tux', 'nsCount' => '3']]], 'total' => '1']]], $group);
    }
}