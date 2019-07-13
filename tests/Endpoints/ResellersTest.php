<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class ResellersTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_contact_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>5391</id></data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->createContactReseller([
            'username' => 'newUser',
            'password' => 'newPassword',
            'role' => 'tech',
            'isActive' => 1,
            'name' => [
                'initials' => 'J.B.',
                'firstName' => 'John',
                'prefix' => 'van',
                'lastName' => 'Halen',
            ],
            'gender' => 'M',
            'phone' => [
                'countryCode' => '+31',
                'areaCode' => '10',
                'subscriberNumber' => '4482299'
            ],
            'email' => 'support@openprovider.nl',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '5391']]], $reseller);
    }

    /** @test */
    public function it_can_do_a_delete_contact_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->deleteContactReseller([
            'id' => 5390
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $reseller);
    }

    /** @test */
    public function it_can_do_a_modify_contact_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->modifyContactReseller([
            'id' => 5390,
            'type' => 'billing',
            'companyName' => 'Billing Co',
            'name' => [
                'initials' => 'M.',
                'firstName' => 'Mark',
                'lastName' => 'Dollar',
            ],
            'address' => [
                'street' => 'Pennylane',
                'number' => '40',
                'zipcode' => '1024 AN',
                'city' => 'Amsterdam',
                'country' => 'NL',
            ],
            'phone' => [
                'countryCode' => '+31',
                'areaCode' => '20',
                'subscriberNumber' => '4482299'
            ],
            'email' => 'billing@openprovider.nl',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $reseller);
    }

    /** @test */
    public function it_can_do_a_modify_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data>1</data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->modifyReseller([
            'address' => [
                'street' => 'Willem Buytewechstraat',
                'number' => '40',
                'zipcode' => '3024 BN',
                'city' => 'Rotterdam',
                'state' => 'Zuid-Holland',
                'country' => 'NL',
            ],

            'phone' => [
                'countryCode' => '+31',
                'areaCode' => '10',
                'subscriberNumber' => '4482292'
            ],

            'fax' => [
                'countryCode' => '+31',
                'areaCode' => '10',
                'subscriberNumber' => '2440250'
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $reseller);
    }

    /** @test */
    public function it_can_do_a_retrieve_contact_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>2292</id><companyName></companyName><name><initials></initials><firstName>Will</firstName><prefix></prefix><lastName>Black</lastName></name><gender>M</gender><phone><countryCode>+31</countryCode><areaCode>10</areaCode><subscriberNumber>4482292</subscriberNumber></phone><address><street></street><number></number><zipcode></zipcode><city></city><country>NL</country></address><email>support@openprovider.nl</email><role>admin</role><isActive>1</isActive><username>willb</username></data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->retrieveContactReseller([
            'id' => 2292
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '2292', 'companyName' => [], 'name' => ['initials' => [], 'firstName' => 'Will', 'prefix' => [], 'lastName' => 'Black'], 'gender' => 'M', 'phone' => ['countryCode' => '+31', 'areaCode' => '10', 'subscriberNumber' => '4482292'], 'address' => ['street' => [], 'number' => [], 'zipcode' => [], 'city' => [], 'country' => 'NL'], 'email' => 'support@openprovider.nl', 'role' => 'admin', 'isActive' => '1', 'username' => 'willb']]], $reseller);
    }

    /** @test */
    public function it_can_do_a_retrieve_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>16342915</id><companyName>Openprovider</companyName><vat>NL809507882B01</vat><phone><countryCode>+31</countryCode><areaCode>10</areaCode><subscriberNumber>4482299</subscriberNumber></phone><address><street>Nieuwe Binnenweg</street><number>137</number><zipcode>3014 GJ</zipcode><city>Rotterdam</city><country>NL</country><state>Zuid-Holland</state></address><balance>263.94</balance></data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->retrieveReseller([
            //
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '16342915', 'companyName' => 'Openprovider', 'vat' => 'NL809507882B01', 'phone' => ['countryCode' => '+31', 'areaCode' => '10', 'subscriberNumber' => '4482299'], 'address' => ['street' => 'Nieuwe Binnenweg', 'number' => '137', 'zipcode' => '3014 GJ', 'city' => 'Rotterdam', 'country' => 'NL', 'state' => 'Zuid-Holland'], 'balance' => '263.94']]], $reseller);
    }

    /** @test */
    public function it_can_do_a_retrieve_settings_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><currency>EUR</currency><language>EN</language><isAutoRenewEnabled>1</isAutoRenewEnabled><minimumPayment>5000</minimumPayment><minimumWesternUnionPayment>500</minimumWesternUnionPayment><CreditCardFeePercent>3</CreditCardFeePercent><maximumIDealPayment>1000</maximumIDealPayment><maximumCreditCardPayment>970</maximumCreditCardPayment><payMethods><array><item>credit_card</item><item>western_union</item><item>bank</item></array></payMethods><signedContracts><array><item><id>eu</id><version>20060221</version><modificationDate>2006-02-21 14:33:32</modificationDate><isSigned>1</isSigned><signOnDate>2006-11-13 11:47:45</signOnDate></item><item><id>com</id><version>20060221</version><modificationDate>2006-02-21 14:33:32</modificationDate><isSigned>1</isSigned><signOnDate>2006-09-15 11:07:23</signOnDate></item><item><id>info</id><version>20060221</version><modificationDate>2006-02-21 14:33:32</modificationDate><isSigned>1</isSigned><signOnDate>2007-06-14 15:01:49</signOnDate></item></array></signedContracts></data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->retrieveSettingsReseller([
            //
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['currency' => 'EUR', 'language' => 'EN', 'isAutoRenewEnabled' => '1', 'minimumPayment' => '5000', 'minimumWesternUnionPayment' => '500', 'CreditCardFeePercent' => '3', 'maximumIDealPayment' => '1000', 'maximumCreditCardPayment' => '970', 'payMethods' => ['array' => ['item' => [0 => 'credit_card', 1 => 'western_union', 2 => 'bank']]], 'signedContracts' => ['array' => ['item' => [0 => ['id' => 'eu', 'version' => '20060221', 'modificationDate' => '2006-02-21 14:33:32', 'isSigned' => '1', 'signOnDate' => '2006-11-13 11:47:45'], 1 => ['id' => 'com', 'version' => '20060221', 'modificationDate' => '2006-02-21 14:33:32', 'isSigned' => '1', 'signOnDate' => '2006-09-15 11:07:23'], 2 => ['id' => 'info', 'version' => '20060221', 'modificationDate' => '2006-02-21 14:33:32', 'isSigned' => '1', 'signOnDate' => '2007-06-14 15:01:49']]]]]]], $reseller);
    }

    /** @test */
    public function it_can_do_a_retrieve_statistics_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><customer><total>447</total><modified>2016-06-17 13:13:02</modified></customer><currency><modified>2010-08-01 09:30:54</modified></currency><domain><byStatus><ACT>11</ACT><FAI>24</FAI><PEN>0</PEN><REQ>3</REQ></byStatus><total>42</total></domain><ssl><byStatus><ACT>1</ACT><FAI>73</FAI><PEN>0</PEN><REQ>13</REQ></byStatus><total>100</total></ssl><dns><total>1433</total></dns><spamExperts><exists>1</exists><status>deleted</status><incomingCount>0</incomingCount><incomingLimit>10</incomingLimit><outgoingCount>0</outgoingCount><outgoingLimit>1</outgoingLimit><withOutgoingFilter>1</withOutgoingFilter><createdAt>2012-10-29 10:48:30</createdAt><activatedAt>2012-10-29 10:48:30</activatedAt><expiredAt>2016-04-05 08:50:34</expiredAt></spamExperts><license><total>0</total></license></data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->retrieveStatisticsReseller([
            //
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['customer' => ['total' => '447', 'modified' => '2016-06-17 13:13:02'], 'currency' => ['modified' => '2010-08-01 09:30:54'], 'domain' => ['byStatus' => ['ACT' => '11', 'FAI' => '24', 'PEN' => '0', 'REQ' => '3'], 'total' => '42'], 'ssl' => ['byStatus' => ['ACT' => '1', 'FAI' => '73', 'PEN' => '0', 'REQ' => '13'], 'total' => '100'], 'dns' => ['total' => '1433'], 'spamExperts' => ['exists' => '1', 'status' => 'deleted', 'incomingCount' => '0', 'incomingLimit' => '10', 'outgoingCount' => '0', 'outgoingLimit' => '1', 'withOutgoingFilter' => '1', 'createdAt' => '2012-10-29 10:48:30', 'activatedAt' => '2012-10-29 10:48:30', 'expiredAt' => '2016-04-05 08:50:34'], 'license' => ['total' => '0']]]], $reseller);
    }

    /** @test */
    public function it_can_do_a_search_contact_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><customer><total>447</total><modified>2016-06-17 13:13:02</modified></customer><currency><modified>2010-08-01 09:30:54</modified></currency><domain><byStatus><ACT>11</ACT><FAI>24</FAI><PEN>0</PEN><REQ>3</REQ></byStatus><total>42</total></domain><ssl><byStatus><ACT>1</ACT><FAI>73</FAI><PEN>0</PEN><REQ>13</REQ></byStatus><total>100</total></ssl><dns><total>1433</total></dns><spamExperts><exists>1</exists><status>deleted</status><incomingCount>0</incomingCount><incomingLimit>10</incomingLimit><outgoingCount>0</outgoingCount><outgoingLimit>1</outgoingLimit><withOutgoingFilter>1</withOutgoingFilter><createdAt>2012-10-29 10:48:30</createdAt><activatedAt>2012-10-29 10:48:30</activatedAt><expiredAt>2016-04-05 08:50:34</expiredAt></spamExperts><license><total>0</total></license></data></reply></openXML>'));

        $reseller = $this->openProvider->resellers()->searchContactReseller([
            'offset' => 0,
            'limit' => 25,
            'role' => 'tech',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['customer' => ['total' => '447', 'modified' => '2016-06-17 13:13:02'], 'currency' => ['modified' => '2010-08-01 09:30:54'], 'domain' => ['byStatus' => ['ACT' => '11', 'FAI' => '24', 'PEN' => '0', 'REQ' => '3'], 'total' => '42'], 'ssl' => ['byStatus' => ['ACT' => '1', 'FAI' => '73', 'PEN' => '0', 'REQ' => '13'], 'total' => '100'], 'dns' => ['total' => '1433'], 'spamExperts' => ['exists' => '1', 'status' => 'deleted', 'incomingCount' => '0', 'incomingLimit' => '10', 'outgoingCount' => '0', 'outgoingLimit' => '1', 'withOutgoingFilter' => '1', 'createdAt' => '2012-10-29 10:48:30', 'activatedAt' => '2012-10-29 10:48:30', 'expiredAt' => '2016-04-05 08:50:34'], 'license' => ['total' => '0']]]], $reseller);
    }
}