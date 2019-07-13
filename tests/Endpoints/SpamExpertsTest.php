<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class SpamExpertsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_domain_se_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>214</id><message>WARNING: Unable to deliver mail through host mail.newfilter.nl:25WARNING: Unable to deliver mail through host fallback.newfilter.nl:100</message></data></reply></openXML>'));

        $se = $this->openProvider->spamexperts()->createDomainSe([
            'domainName' => 'newfilter.nl',
            'destinations' => [
                ['hostname' => 'mail.newfilter.nl', 'port' => 25],
                ['hostname' => 'fallback.newfilter.nl', 'port' => 100]
            ],
            'products' => [
                'incoming' => 1,
                'outgoing' => 1,
                'archiving' => 0,
            ],
            'aliases' => [
                'newfilter.com',
                'newfilter.net',
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '214', 'message' => 'WARNING: Unable to deliver mail through host mail.newfilter.nl:25WARNING: Unable to deliver mail through host fallback.newfilter.nl:100']]], $se);
    }

    /** @test */
    public function it_can_do_a_delete_domain_se_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><message></message></data></reply></openXML>'));

        $se = $this->openProvider->spamexperts()->deleteDomainSe([
            'domainName' => 'newfilter.nl',
            'bundle' => '0'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['message' => []]]], $se);
    }

    /** @test */
    public function it_can_do_a_generate_se_login_url_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><url>http://spamexperts.openprovider.eu//?authticket=086ee798cfa3c6af0123553cfd4774757223fdfe</url></data></reply></openXML>'));

        $se = $this->openProvider->spamexperts()->generateSeLoginUrl([
            'domainOrEmail' => 'newfilter.nl',
            'bundle' => '1',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['url' => 'http://spamexperts.openprovider.eu//?authticket=086ee798cfa3c6af0123553cfd4774757223fdfe']]], $se);
    }

    /** @test */
    public function it_can_do_a_modify_domain_se_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $se = $this->openProvider->spamexperts()->modifyDomainSe([
            'domainName' => 'newfilter.nl',
            'destinations' => [
                ['hostname' => 'mail.newfilter.nl', 'port' => 25],
                ['hostname' => 'fallback.newfilter.nl', 'port' => 100]
            ],
            'products' => [
                'incoming' => 1,
                'outgoing' => 1,
                'archiving' => 0,
            ],
            'aliases' => [
                'newfilter.com',
                'newfilter.net',
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $se);
    }

    /** @test */
    public function it_can_do_a_retrieve_domain_se_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><resellerId>123456</resellerId><isActive>1</isActive><withOutgoingFilter>0</withOutgoingFilter><domainName>filter.nl</domainName><userEmail>admin@filter.nl</userEmail><userPassword>qweasdzxc</userPassword><smtpPassword></smtpPassword><products><incoming>1</incoming><outgoing>0</outgoing><archiving>1</archiving></products><expirationDate>2017-09-01</expirationDate><records><destinations><array><item><hostname>mbox001.filter.nl</hostname><port>25</port></item></array></destinations><aliases/><outgoingUserIps/></records></data></reply></openXML>'));

        $se = $this->openProvider->spamexperts()->retrieveDomainSe([
            'domainName' => 'filter.nl',
            'bundle' => 0,
            'withRecords' => 1,
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['resellerId' => '123456', 'isActive' => '1', 'withOutgoingFilter' => '0', 'domainName' => 'filter.nl', 'userEmail' => 'admin@filter.nl', 'userPassword' => 'qweasdzxc', 'smtpPassword' => [], 'products' => ['incoming' => '1', 'outgoing' => '0', 'archiving' => '1'], 'expirationDate' => '2017-09-01', 'records' => ['destinations' => ['array' => ['item' => ['hostname' => 'mbox001.filter.nl', 'port' => '25']]], 'aliases' => [], 'outgoingUserIps' => []]]]], $se);
    }
}