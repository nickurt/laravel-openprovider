<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class DomainsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_check_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><array><item><domain>openprovider.nl</domain><status>active</status><reason>Domain exists</reason></item><item><domain>this-domain-is-free.biz</domain><status>free</status></item><item><domain>greece.guru</domain><status>active</status><reason>Reserved Domain Name</reason></item></array></data></reply></openXML>'));

        $domain = $this->openProvider->domains()->checkDomain([
            'domain' => [
                'name' => 'openprovider',
                'extension' => 'nl'
            ],
            'withAdditionalData' => 0
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['array' => ['item' => [0 => ['domain' => 'openprovider.nl', 'status' => 'active', 'reason' => 'Domain exists'], 1 => ['domain' => 'this-domain-is-free.biz', 'status' => 'free'], 2 => ['domain' => 'greece.guru', 'status' => 'active', 'reason' => 'Reserved Domain Name']]]]]], $domain);
    }

    /** @test */
    public function it_can_do_a_create_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><status>ACT</status><activationDate>2011-04-22 14:14:32</activationDate><expirationDate>2012-04-22 14:41:32</expirationDate><expirationDateOpenprovider>2012-04-22 14:41:32</expirationDateOpenprovider><authCode>123456</authCode></data></reply></openXML>'));

        $domain = $this->openProvider->domains()->createDomain([
            'ownerHandle' => 'SR003891-NL',
            'adminHandle' => 'SR003891-NL',
            'techHandle' => 'SR003891-NL',
            'billingHandle' => 'SR003891-NL',
            'domain' => [
                'name' => 'this-domain-is-registered',
                'extension' => 'com'
            ],
            'period' => '1',
            'nsGroup' => 'dns-openprovider',
            'nsTemplateName' => 'Shared hosting server Apollo',
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['status' => 'ACT', 'activationDate' => '2011-04-22 14:14:32', 'expirationDate' => '2012-04-22 14:41:32', 'expirationDateOpenprovider' => '2012-04-22 14:41:32', 'authCode' => '123456']]], $domain);
    }

    /** @test */
    public function it_can_do_a_delete_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->deleteDomain([
            'domain' => [
                'name' => 'domain-to-delete',
                'extension' => 'nl'
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_modify_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->modifyDomain([
            'adminHandle' => 'SR003891-NL',
            'techHandle' => 'SR003891-NL',
            'billingHandle' => 'SR003891-NL',
            'domain' => [
                'name' => 'openprovider',
                'extension' => 'nl'
            ],
            'nsGroup' => 'MyServer',
            'isDnssecEnabled' => 1,
            'dnssecKeys' => [
                [
                    'flags' => 256,
                    'alg' => 8,
                    'protocol' => 3,
                    'pubKey' => 'AwEAA{...}VNfPps3=',
                ],
                [
                    'flags' => 257,
                    'alg' => 8,
                    'protocol' => 3,
                    'pubKey' => 'AwEAA{...}TK5f9fs=',
                ],
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_renew_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->renewDomain([
            'domain' => [
                'name' => 'openprovider',
                'extension' => 'nl'
            ],
            'period' => 1
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_request_auth_code_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->requestAuthCodeDomain([
            'domain' => [
                'name' => 'domain',
                'extension' => 'be'
            ],
            'authCodeType' => 'external',
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_reset_auth_code_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->resetAuthCodeDomain([
            'domain' => [
                'name' => 'domain',
                'extension' => 'com'
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_restore_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->restoreDomain([
            'domain' => [
                'name' => 'openprovider',
                'extension' => 'nl'
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_retrieve_additional_data_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><array><item><name>legalType</name><description>Legal type</description><required>1</required><type>select</type><options><array><item><value>ABO</value><description>Aboriginal Peoples indigenous to Canada</description></item><item><value>ASS</value><description>Canadian Unincorporated Association</description></item><item><value>TRS</value><description>Trust established in Canada</description></item></array></options></item></array></data></reply></openXML>'));

        $domain = $this->openProvider->domains()->retrieveAdditionalDataDomain([
            'domain' => [
                'extension' => 'ca'
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['array' => ['item' => ['name' => 'legalType', 'description' => 'Legal type', 'required' => '1', 'type' => 'select', 'options' => ['array' => ['item' => [0 => ['value' => 'ABO', 'description' => 'Aboriginal Peoples indigenous to Canada'], 1 => ['value' => 'ASS', 'description' => 'Canadian Unincorporated Association'], 2 => ['value' => 'TRS', 'description' => 'Trust established in Canada']]]]]]]]], $domain);
    }

    /** @test */
    public function it_can_do_a_retrieve_customer_additional_data_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><array><item><name>nexusCategory</name><description>Nexus category</description><required>1</required><type>select</type><options><array><item><value>C11</value><description>Natural person who is a United States citizen</description></item><item><value>C12</value><description>Natural person whois a permanent resident of the United States of America or any of its possessions or territories. A U.S. Organization incorporated within one of the fifty (50) U.S. States, the District of Columbia, or any of the U.S. Possessions or territories or organized or otherwise constituted under the laws of a state of the United States of America, the District of Columbia or any of its possessions or territories or a U.S. Federal, state, or local government entity or a political subdivision thereof.</description></item><item><value>C21</value><description>C21 - U.S. Organization incorporated within one of the 50 states or a U.S. Territory. An entity or organization that has a bona fide presence in the Unite States of America or any of its possessions or territories.</description></item><item><value>C31</value><description>Regularly engages in lawful activities (sales of goods or services or other business, commercial or non-commercial, including not-for-profit relations in the United States).</description></item><item><value>C32</value><description>Entity has an office or other facility in the US.</description></item></array></options></item></array></data></reply></openXML>'));

        $domain = $this->openProvider->domains()->retrieveCustomerAdditionalDataDomain([
            'domain' => [
                'extension' => 'us'
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['array' => ['item' => ['name' => 'nexusCategory', 'description' => 'Nexus category', 'required' => '1', 'type' => 'select', 'options' => ['array' => ['item' => [0 => ['value' => 'C11', 'description' => 'Natural person who is a United States citizen'], 1 => ['value' => 'C12', 'description' => 'Natural person whois a permanent resident of the United States of America or any of its possessions or territories. A U.S. Organization incorporated within one of the fifty (50) U.S. States, the District of Columbia, or any of the U.S. Possessions or territories or organized or otherwise constituted under the laws of a state of the United States of America, the District of Columbia or any of its possessions or territories or a U.S. Federal, state, or local government entity or a political subdivision thereof.'], 2 => ['value' => 'C21', 'description' => 'C21 - U.S. Organization incorporated within one of the 50 states or a U.S. Territory. An entity or organization that has a bona fide presence in the Unite States of America or any of its possessions or territories.'], 3 => ['value' => 'C31', 'description' => 'Regularly engages in lawful activities (sales of goods or services or other business, commercial or non-commercial, including not-for-profit relations in the United States).'], 4 => ['value' => 'C32', 'description' => 'Entity has an office or other facility in the US.']]]]]]]]], $domain);
    }

    /** @test */
    public function it_can_do_a_retrieve_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><domain><name>abcdefg4</name><extension>nl</extension></domain><nameServers /><id>341105</id><isLockable>0</isLockable><isLocked>0</isLocked><comments></comments><orderDate>2010-03-15 16:50:19</orderDate><activeDate /><expirationDate></expirationDate><expirationDateOpenprovider></expirationDateOpenprovider><status>FAI</status><canRenew>0</canRenew><autoRenew>0</autoRenew><ownerHandle>OH002766-NL</ownerHandle><adminHandle>OH002766-NL</adminHandle><techHandle>OH002766-NL</techHandle><billingHandle>SR003891-NL</billingHandle><nsGroup>opdrs4</nsGroup><type>NEW</type><authCode></authCode><authorizationCodeRequired>0</authorizationCodeRequired><tradeAllowed>1</tradeAllowed><restorePrice>70</restorePrice><useDomicile>0</useDomicile><ownerName><initials>N.</initials><firstName>Nigel</firstName><prefix /><lastName>Jones</lastName></ownerName><ownerCompanyName></ownerCompanyName></data></reply></openXML>'));

        $domain = $this->openProvider->domains()->retrieveDomain([
            'domains' => [
                [
                    'name' => 'openprovider',
                    'extension' => 'com'
                ],
                [
                    'name' => 'this-domain-is-free',
                    'extension' => 'biz'
                ]
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['domain' => ['name' => 'abcdefg4', 'extension' => 'nl'], 'nameServers' => [], 'id' => '341105', 'isLockable' => '0', 'isLocked' => '0', 'comments' => [], 'orderDate' => '2010-03-15 16:50:19', 'activeDate' => [], 'expirationDate' => [], 'expirationDateOpenprovider' => [], 'status' => 'FAI', 'canRenew' => '0', 'autoRenew' => '0', 'ownerHandle' => 'OH002766-NL', 'adminHandle' => 'OH002766-NL', 'techHandle' => 'OH002766-NL', 'billingHandle' => 'SR003891-NL', 'nsGroup' => 'opdrs4', 'type' => 'NEW', 'authCode' => [], 'authorizationCodeRequired' => '0', 'tradeAllowed' => '1', 'restorePrice' => '70', 'useDomicile' => '0', 'ownerName' => ['initials' => 'N.', 'firstName' => 'Nigel', 'prefix' => [], 'lastName' => 'Jones'], 'ownerCompanyName' => []]]], $domain);
    }

    /** @test */
    public function it_can_do_a_retrieve_price_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><price><product><price>100000.00</price><currency>USD</currency></product><reseller><price>93381.69</price><currency>EUR</currency></reseller></price><isPremium>1</isPremium></data></reply></openXML>'));

        $domain = $this->openProvider->domains()->retrievePriceDomain([
            'domain' => [
                'name' => 'domain',
                'extension' => 'guru'
            ],
            'operation' => 'create',
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['price' => ['product' => ['price' => '100000.00', 'currency' => 'USD'], 'reseller' => ['price' => '93381.69', 'currency' => 'EUR']], 'isPremium' => '1']]], $domain);
    }

    /** @test */
    public function it_can_do_a_search_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><domain><name>test-free-registration</name><extension>nl</extension></domain><nameServers /><id>353146</id><isLockable>0</isLockable><isLocked>0</isLocked><comments></comments><orderDate>2010-04-20 16:16:26</orderDate><activeDate>2010-04-20 16:16:29</activeDate><expirationDate>2011-04-20 14:16:28</expirationDate><expirationDateOpenprovider>2011-04-20 14:16:28</expirationDateOpenprovider><status>ACT</status><canRenew>0</canRenew><autoRenew>1</autoRenew><ownerHandle>NL000115-NL</ownerHandle><adminHandle>NL000115-NL</adminHandle><techHandle>NL000115-NL</techHandle><billingHandle>SR003891-NL</billingHandle><nsGroup>dns-openprovider</nsGroup><type>NEW</type><authCode>sad08dfdsf</authCode><authorizationCodeRequired>0</authorizationCodeRequired><tradeAllowed>1</tradeAllowed><restorePrice>70</restorePrice><useDomicile>0</useDomicile><ownerName><initials>N</initials><firstName>Nigel</firstName><prefix /><lastName>Jones</lastName></ownerName><ownerCompanyName>Company Ltd</ownerCompanyName></item><item><domain><name>test-free-domain</name><extension>nl</extension></domain><nameServers /><id>353163</id><isLockable>0</isLockable><isLocked>0</isLocked><comments /><orderDate>2010-04-20 17:12:47</orderDate><activeDate>2010-04-20 17:12:51</activeDate><expirationDate>2011-04-20 15:12:50</expirationDate><expirationDateOpenprovider>2011-04-20 15:12:50</expirationDateOpenprovider><status>ACT</status><canRenew>0</canRenew><autoRenew>1</autoRenew><ownerHandle>GB000002-GB</ownerHandle><adminHandle>GB000002-GB</adminHandle><techHandle>GB000002-GB</techHandle><billingHandle>SR003891-NL</billingHandle><nsGroup>dns-openprovider</nsGroup><type>NEW</type><authCode>sad08dfdsf</authCode><authorizationCodeRequired>0</authorizationCodeRequired><tradeAllowed>1</tradeAllowed><restorePrice>70</restorePrice><useDomicile>0</useDomicile><ownerName><initials>UK</initials><firstName>Great</firstName><prefix /><lastName>Britain</lastName></ownerName><ownerCompanyName></ownerCompanyName></item><item><domain><name>abcdefg</name><extension>nl</extension></domain><nameServers /><id>341105</id><isLockable>0</isLockable><isLocked>0</isLocked><comments /><orderDate>2010-03-15 16:50:19</orderDate><activeDate /><expirationDate>2011-03-15 16:50:19</expirationDate><expirationDateOpenprovider /><status>FAI</status><canRenew>0</canRenew><autoRenew>0</autoRenew><ownerHandle>OH002766-NL</ownerHandle><adminHandle>OH002766-NL</adminHandle><techHandle>OH002766-NL</techHandle><billingHandle>SR003891-NL</billingHandle><nsGroup>opdrs4</nsGroup><type>NEW</type><authCode>88sdkjhf7</authCode><authorizationCodeRequired>0</authorizationCodeRequired><tradeAllowed>1</tradeAllowed><restorePrice>70</restorePrice><useDomicile>0</useDomicile><ownerName><initials>I.</initials><firstName>Ibrahim</firstName><prefix /><lastName>Smith</lastName></ownerName><ownerCompanyName></ownerCompanyName></item></array></results><total>3</total></data></reply></openXML>'));

        $domains = $this->openProvider->domains()->searchDomain([
            'offset' => 50,
            'limit' => 25,
            'contactHandle' => 'AH009176-US',
            'domainNamePattern' => 'openprovider',
            'orderBy' => 'domainName',
            'order' => 'desc'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['domain' => ['name' => 'test-free-registration', 'extension' => 'nl'], 'nameServers' => [], 'id' => '353146', 'isLockable' => '0', 'isLocked' => '0', 'comments' => [], 'orderDate' => '2010-04-20 16:16:26', 'activeDate' => '2010-04-20 16:16:29', 'expirationDate' => '2011-04-20 14:16:28', 'expirationDateOpenprovider' => '2011-04-20 14:16:28', 'status' => 'ACT', 'canRenew' => '0', 'autoRenew' => '1', 'ownerHandle' => 'NL000115-NL', 'adminHandle' => 'NL000115-NL', 'techHandle' => 'NL000115-NL', 'billingHandle' => 'SR003891-NL', 'nsGroup' => 'dns-openprovider', 'type' => 'NEW', 'authCode' => 'sad08dfdsf', 'authorizationCodeRequired' => '0', 'tradeAllowed' => '1', 'restorePrice' => '70', 'useDomicile' => '0', 'ownerName' => ['initials' => 'N', 'firstName' => 'Nigel', 'prefix' => [], 'lastName' => 'Jones'], 'ownerCompanyName' => 'Company Ltd'], 1 => ['domain' => ['name' => 'test-free-domain', 'extension' => 'nl'], 'nameServers' => [], 'id' => '353163', 'isLockable' => '0', 'isLocked' => '0', 'comments' => [], 'orderDate' => '2010-04-20 17:12:47', 'activeDate' => '2010-04-20 17:12:51', 'expirationDate' => '2011-04-20 15:12:50', 'expirationDateOpenprovider' => '2011-04-20 15:12:50', 'status' => 'ACT', 'canRenew' => '0', 'autoRenew' => '1', 'ownerHandle' => 'GB000002-GB', 'adminHandle' => 'GB000002-GB', 'techHandle' => 'GB000002-GB', 'billingHandle' => 'SR003891-NL', 'nsGroup' => 'dns-openprovider', 'type' => 'NEW', 'authCode' => 'sad08dfdsf', 'authorizationCodeRequired' => '0', 'tradeAllowed' => '1', 'restorePrice' => '70', 'useDomicile' => '0', 'ownerName' => ['initials' => 'UK', 'firstName' => 'Great', 'prefix' => [], 'lastName' => 'Britain'], 'ownerCompanyName' => []], 2 => ['domain' => ['name' => 'abcdefg', 'extension' => 'nl'], 'nameServers' => [], 'id' => '341105', 'isLockable' => '0', 'isLocked' => '0', 'comments' => [], 'orderDate' => '2010-03-15 16:50:19', 'activeDate' => [], 'expirationDate' => '2011-03-15 16:50:19', 'expirationDateOpenprovider' => [], 'status' => 'FAI', 'canRenew' => '0', 'autoRenew' => '0', 'ownerHandle' => 'OH002766-NL', 'adminHandle' => 'OH002766-NL', 'techHandle' => 'OH002766-NL', 'billingHandle' => 'SR003891-NL', 'nsGroup' => 'opdrs4', 'type' => 'NEW', 'authCode' => '88sdkjhf7', 'authorizationCodeRequired' => '0', 'tradeAllowed' => '1', 'restorePrice' => '70', 'useDomicile' => '0', 'ownerName' => ['initials' => 'I.', 'firstName' => 'Ibrahim', 'prefix' => [], 'lastName' => 'Smith'], 'ownerCompanyName' => []]]]], 'total' => '3']]], $domains);
    }

    /** @test */
    public function it_can_do_a_send_foa1_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->sendFoa1Domain([
            'domain' => [
                'name' => 'openprovider',
                'extension' => 'nl'
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_trade_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>364</code><desc>Owner handle must differ from the current one.</desc><data /></reply></openXML>'));

        $domain = $this->openProvider->domains()->tradeDomain([
            'ownerHandle' => 'SR003891-NL',
            'adminHandle' => 'SR003891-NL',
            'techHandle' => 'SR003891-NL',
            'billingHandle' => 'SR003891-NL',
            'domain' => [
                'name' => 'openprovider',
                'extension' => 'nl'
            ],
            'nsGroup' => 'MyServer',
        ]);

        $this->assertSame(['reply' => ['code' => '364', 'desc' => 'Owner handle must differ from the current one.', 'data' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_transfer_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->transferDomain([
            'ownerHandle' => 'SR003891-NL',
            'adminHandle' => 'SR003891-NL',
            'techHandle' => 'SR003891-NL',
            'billingHandle' => 'SR003891-NL',
            'domain' => [
                'name' => 'domain',
                'extension' => 'com'
            ],
            'period' => '1',
            'authCode' => 'asd79SAD(8sd',
            'nameServers' => [
                [
                    'name' => 'ns1.yourdomain.com',
                    'ip' => '100.1.2.3',
                    'ip6' => '2a01:d078:0:147:94:198:153:68',
                ],
                [
                    'name' => 'ns2.yourdomain.com',
                    'ip' => '100.1.2.6',
                    'ip6' => '20f1:610:0:800d::15',
                ],
            ],
            'dnssecKeys' => [
                [
                    'flags' => 256,
                    'alg' => 8,
                    'pubKey' => 'AwEAA{...}VNfPps3=',
                ],
                [
                    'flags' => 257,
                    'alg' => 8,
                    'pubKey' => 'AwEAA{...}TK5f9fs=',
                ],
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_a_try_again_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->tryAgainDomain([
            'domain' => [
                'name' => 'failed-domain',
                'extension' => 'com'
            ]
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }

    /** @test */
    public function it_can_do_an_approve_transfer_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $domain = $this->openProvider->domains()->approveTransferDomain([
            'domain' => [
                'name' => 'domain-to-delete',
                'extension' => 'nl'
            ],
            'approve' => 1
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => []]], $domain);
    }
}
