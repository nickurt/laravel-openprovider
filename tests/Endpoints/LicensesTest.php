<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class LicensesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_plesk_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>236278</id></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->createPleskLicense([
            'period' => 1,
            'title' => 'Plesk Web Admin with features',
            'items' => [
                'PLESK-12-WEB-ADMIN-1M',
                'FT-PLESK-DEVELOPER-PACK-1M',
                'FT-PLESK-WPB-10-SITES-1M',
                'FT-PLESK-DISABLE-SITEBUILDER',
                'FT-PLESK-EMAIL-SECURITY-PACK-WITH-KASPERSKY-AV',
                'FT-PLESK-CLOUDFLARE-SERVERSHIELD-PLUS-ADVANCED',
                'FT-PLESK-1-LANGUAGE-PACK-1M'
            ],
            'attachedKeys' => [
                'ADD-DNSSEC-1M',
                'ADD-ADDENDIO-DOCKER-BUSINESS-1M'
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '236278']]], $license);
    }

    /** @test */
    public function it_can_do_a_create_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>236278</id></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->createVirtuozzoLicense([
            'period' => '12',
            'product' => 'virtuozzo',
            'title' => 'VZ Storage 10GB',
            'comment' => 'test',
            'items' => [
                'Virtuozzo storage'
            ],
            'pcsCapacity' => '1',
            'restrictIPBinding' => '1'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '236278']]], $license);
    }

    /** @test */
    public function it_can_do_a_delete_plesk_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $license = $this->openProvider->licenses()->deletePleskLicense([
            'keyId' => '1446',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $license);
    }

    /** @test */
    public function it_can_do_a_delete_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $license = $this->openProvider->licenses()->deleteVirtuozzoLicense([
            'keyId' => '74351955'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $license);
    }

    /** @test */
    public function it_can_do_a_modify_plesk_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $license = $this->openProvider->licenses()->modifyPleskLicense([
            'id' => 1446,
            'title' => 'Linux server ARTEMIS',
            'comment' => 'Old server name: APOLLO'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $license);
    }

    /** @test */
    public function it_can_do_a_modify_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $license = $this->openProvider->licenses()->modifyVirtuozzoLicense([
            'id' => 1446,
            'title' => 'Linux server ARTEMIS',
            'comment' => 'Old server name: APOLLO'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $license);
    }

    /** @test */
    public function it_can_do_a_reset_license_hwid_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $license = $this->openProvider->licenses()->resetLicenseHWID([
            'product' => 'virtuozzo',
            'keyId' => '74351940'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $license);
    }

    /** @test */
    public function it_can_do_a_retrieve_key_plesk_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48cGxlc2stdW5pZmllZDprZXkgeG1sbnM6cGxlc2stdW5pZmllZD0iaHR...</data></reply></openXML>'));

        $license = $this->openProvider->licenses()->retrieveKeyPleskLicense([
            'id' => 1446
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48cGxlc2stdW5pZmllZDprZXkgeG1sbnM6cGxlc2stdW5pZmllZD0iaHR...']], $license);
    }

    /** @test */
    public function it_can_do_a_retrieve_key_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48cGxlc2stdW5pZmllZDprZXkgeG1sbnM6cGxlc2stdW5pZmllZD0iaHR...</data></reply></openXML>'));

        $license = $this->openProvider->licenses()->retrieveKeyVirtuozzoLicense([
            'keyId' => 74351955
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48cGxlc2stdW5pZmllZDprZXkgeG1sbnM6cGxlc2stdW5pZmllZD0iaHR...']], $license);
    }

    /** @test */
    public function it_can_do_a_retrieve_plesk_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><title>test</title><comment>comment</comment><product>plesk</product><contract>2014</contract><keyId>4867003</keyId><parentKeyId></parentKeyId><keyNumber>PLSK.04867003</keyNumber><billingType>lease</billingType><period>1</period><status>DEL</status><orderDate>2018-08-28 07:18:54</orderDate><expirationDate>0000-00-00 00:00:00</expirationDate><items><array><item>PLESK-12-VPS-WEB-ADMIN-1M</item></array></items><skuValues><PLSKVPS-ADM-M>1</PLSKVPS-ADM-M></skuValues><activationCode>A00B00-******-4MDN86-******-DVE103</activationCode><ipAddressBinding>127.0.0.33</ipAddressBinding><key><product>plesk</product><title>Plesk for VPS Web Admin Edition</title><item>PLESK-12-VPS-WEB-ADMIN-1M</item><group><product>plesk</product><name>plesk-12-onyx-keys</name><description>Plesk 12/Onyx keys</description><itemsType>key</itemsType></group><subgroup><id></id><title></title></subgroup><compatibility><vps>1</vps><standalone>0</standalone></compatibility><skuValues><PLSKVPS-ADM-M>1</PLSKVPS-ADM-M></skuValues></key><features/><extensions/></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->retrievePleskLicense([
            'keyId' => '04879719',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['title' => 'test', 'comment' => 'comment', 'product' => 'plesk', 'contract' => '2014', 'keyId' => '4867003', 'parentKeyId' => [], 'keyNumber' => 'PLSK.04867003', 'billingType' => 'lease', 'period' => '1', 'status' => 'DEL', 'orderDate' => '2018-08-28 07:18:54', 'expirationDate' => '0000-00-00 00:00:00', 'items' => ['array' => ['item' => 'PLESK-12-VPS-WEB-ADMIN-1M']], 'skuValues' => ['PLSKVPS-ADM-M' => '1'], 'activationCode' => 'A00B00-******-4MDN86-******-DVE103', 'ipAddressBinding' => '127.0.0.33', 'key' => ['product' => 'plesk', 'title' => 'Plesk for VPS Web Admin Edition', 'item' => 'PLESK-12-VPS-WEB-ADMIN-1M', 'group' => ['product' => 'plesk', 'name' => 'plesk-12-onyx-keys', 'description' => 'Plesk 12/Onyx keys', 'itemsType' => 'key'], 'subgroup' => ['id' => [], 'title' => []], 'compatibility' => ['vps' => '1', 'standalone' => '0'], 'skuValues' => ['PLSKVPS-ADM-M' => '1']], 'features' => [], 'extensions' => []]]], $license);
    }

    /** @test */
    public function it_can_do_a_retrieve_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><title></title><comment></comment><product>virtuozzo</product><contract>2014</contract><keyId>74351955</keyId><parentKeyId></parentKeyId><keyNumber>VZ.74351955</keyNumber><billingType>lease</billingType><period>1</period><status>ACT</status><orderDate>2018-09-13 10:06:46</orderDate><expirationDate>2018-10-12 18:00:00</expirationDate><items><array><item>VIRTUOZZO-7-LOW-DENSITY-2CPU-1M</item></array></items><skuValues><VZ-LD-2-M>1</VZ-LD-2-M></skuValues><activationCode>A40X00-******-E0MJ35-******-M56Z55</activationCode><ipAddressBinding></ipAddressBinding><key><product>virtuozzo</product><title>Virtuozzo 7.x Low Density, Up to 2 CPU Sockets</title><item>VIRTUOZZO-7-LOW-DENSITY-2CPU-1M</item><group><product>virtuozzo</product><name>virtuozzo-7x-keys</name><description>Virtuozzo 7.x keys</description><itemsType>key</itemsType></group><subgroup><id></id><title></title></subgroup><compatibility><vps>1</vps><standalone>1</standalone></compatibility><skuValues><VZ-LD-2-M>1</VZ-LD-2-M></skuValues></key><features/><extensions/></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->retrieveVirtuozzoLicense([
            'keyId' => '74351955',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['title' => [], 'comment' => [], 'product' => 'virtuozzo', 'contract' => '2014', 'keyId' => '74351955', 'parentKeyId' => [], 'keyNumber' => 'VZ.74351955', 'billingType' => 'lease', 'period' => '1', 'status' => 'ACT', 'orderDate' => '2018-09-13 10:06:46', 'expirationDate' => '2018-10-12 18:00:00', 'items' => ['array' => ['item' => 'VIRTUOZZO-7-LOW-DENSITY-2CPU-1M']], 'skuValues' => ['VZ-LD-2-M' => '1'], 'activationCode' => 'A40X00-******-E0MJ35-******-M56Z55', 'ipAddressBinding' => [], 'key' => ['product' => 'virtuozzo', 'title' => 'Virtuozzo 7.x Low Density, Up to 2 CPU Sockets', 'item' => 'VIRTUOZZO-7-LOW-DENSITY-2CPU-1M', 'group' => ['product' => 'virtuozzo', 'name' => 'virtuozzo-7x-keys', 'description' => 'Virtuozzo 7.x keys', 'itemsType' => 'key'], 'subgroup' => ['id' => [], 'title' => []], 'compatibility' => ['vps' => '1', 'standalone' => '1'], 'skuValues' => ['VZ-LD-2-M' => '1']], 'features' => [], 'extensions' => []]]], $license);
    }

    /** @test */
    public function it_can_do_a_search_plesk_and_virtuozzo_item_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><product>plesk</product><title>1 Language Pack for Plesk 12/Onyx</title><item>FT-PLESK-1-LANGUAGE-PACK-1M</item><group><product>plesk</product><name>plesk-genuine-ext-multilang-support-features</name><description>Genuine extensions - Multilanguage support</description><itemsType>feature</itemsType></group><subgroup><id></id><title></title></subgroup><compatibility><vps>0</vps><standalone>1</standalone></compatibility><skuValues><PLSK-ADD-LP-M>1</PLSK-ADD-LP-M></skuValues></item></array></results><total>122</total></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->searchPleskAndVirtuozzoItem([
            'product' => 'plesk',
            'limit' => 1
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['product' => 'plesk', 'title' => '1 Language Pack for Plesk 12/Onyx', 'item' => 'FT-PLESK-1-LANGUAGE-PACK-1M', 'group' => ['product' => 'plesk', 'name' => 'plesk-genuine-ext-multilang-support-features', 'description' => 'Genuine extensions - Multilanguage support', 'itemsType' => 'feature'], 'subgroup' => ['id' => [], 'title' => []], 'compatibility' => ['vps' => '0', 'standalone' => '1'], 'skuValues' => ['PLSK-ADD-LP-M' => '1']]]], 'total' => '122']]], $license);
    }

    /** @test */
    public function it_can_do_a_search_plesk_and_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><title></title><comment></comment><product>virtuozzo</product><contract>2014</contract><keyId>74350716</keyId><parentKeyId></parentKeyId><keyNumber>PCSS.74350716</keyNumber><billingType>lease</billingType><period>1</period><status>DEL</status><orderDate>2018-08-31 10:43:01</orderDate><expirationDate>0000-00-00 00:00:00</expirationDate><items><array><item>Virtuozzo storage</item><item>Monthly SUS for Virtuozzo containers/with VMs</item></array></items><skuValues><PCSS-100GB-M>1</PCSS-100GB-M></skuValues><activationCode>A40E00-******-ZDA035-******-A5X116</activationCode><priceVersion>1</priceVersion></item></array></results><total>250</total></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->searchPleskAndVirtuozzoLicense([
            'limit' => 1,
            'offset' => 0
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['title' => [], 'comment' => [], 'product' => 'virtuozzo', 'contract' => '2014', 'keyId' => '74350716', 'parentKeyId' => [], 'keyNumber' => 'PCSS.74350716', 'billingType' => 'lease', 'period' => '1', 'status' => 'DEL', 'orderDate' => '2018-08-31 10:43:01', 'expirationDate' => '0000-00-00 00:00:00', 'items' => ['array' => ['item' => [0 => 'Virtuozzo storage', 1 => 'Monthly SUS for Virtuozzo containers/with VMs']]], 'skuValues' => ['PCSS-100GB-M' => '1'], 'activationCode' => 'A40E00-******-ZDA035-******-A5X116', 'priceVersion' => '1']]], 'total' => '250']]], $license);
    }

    /** @test */
    public function it_can_do_a_search_plesk_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><title>Test</title><comment></comment><product>plesk</product><contract>2014</contract><keyId>4879719</keyId><parentKeyId></parentKeyId><keyNumber>PLSK.04879719</keyNumber><billingType>lease</billingType><period>1</period><status>ACT</status><orderDate>2018-09-05 11:07:35</orderDate><expirationDate>2018-10-04 18:00:00</expirationDate><items><array><item>PLESK-12-VPS-WEB-ADMIN-1M</item></array></items><skuValues><PLSKVPS-ADM-M>1</PLSKVPS-ADM-M></skuValues><activationCode>A00F00-******-YHDH87-******-9VBS19</activationCode><ipAddressBinding>8.8.8.7</ipAddressBinding></item></array></results><total>1</total></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->searchPleskLicense([
            'keyNumber' => 'PLSK.04879719'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['title' => 'Test', 'comment' => [], 'product' => 'plesk', 'contract' => '2014', 'keyId' => '4879719', 'parentKeyId' => [], 'keyNumber' => 'PLSK.04879719', 'billingType' => 'lease', 'period' => '1', 'status' => 'ACT', 'orderDate' => '2018-09-05 11:07:35', 'expirationDate' => '2018-10-04 18:00:00', 'items' => ['array' => ['item' => 'PLESK-12-VPS-WEB-ADMIN-1M']], 'skuValues' => ['PLSKVPS-ADM-M' => '1'], 'activationCode' => 'A00F00-******-YHDH87-******-9VBS19', 'ipAddressBinding' => '8.8.8.7']]], 'total' => '1']]], $license);
    }

    /** @test */
    public function it_can_do_a_search_virtuozzo_license_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><title></title><comment></comment><product>virtuozzo</product><contract>2014</contract><keyId>74351955</keyId><parentKeyId></parentKeyId><keyNumber>VZ.74351955</keyNumber><billingType>lease</billingType><period>1</period><status>ACT</status><orderDate>2018-09-13 10:06:46</orderDate><expirationDate>2018-10-12 18:00:00</expirationDate><items><array><item>VIRTUOZZO-7-LOW-DENSITY-2CPU-1M</item></array></items><skuValues><VZ-LD-2-M>1</VZ-LD-2-M></skuValues><activationCode>A40X00-******-E0MJ35-******-M56Z55</activationCode><ipAddressBinding></ipAddressBinding></item></array></results><total>1</total></data></reply></openXML>'));

        $license = $this->openProvider->licenses()->searchVirtuozzoLicense([
            'keyId' => '74351955'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['title' => [], 'comment' => [], 'product' => 'virtuozzo', 'contract' => '2014', 'keyId' => '74351955', 'parentKeyId' => [], 'keyNumber' => 'VZ.74351955', 'billingType' => 'lease', 'period' => '1', 'status' => 'ACT', 'orderDate' => '2018-09-13 10:06:46', 'expirationDate' => '2018-10-12 18:00:00', 'items' => ['array' => ['item' => 'VIRTUOZZO-7-LOW-DENSITY-2CPU-1M']], 'skuValues' => ['VZ-LD-2-M' => '1'], 'activationCode' => 'A40X00-******-E0MJ35-******-M56Z55', 'ipAddressBinding' => []]]], 'total' => '1']]], $license);
    }
}