<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class CustomersTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_customer_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><handle>JH000001-US</handle></data></reply></openXML>'));

        $customer = $this->openProvider->customers()->createCustomer([
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
            'fax' => [
                'countryCode' => '+31',
                'areaCode' => '10',
                'subscriberNumber' => '2440250'
            ],
            'address' => [
                'street' => 'Nieuwe Binnenweg',
                'number' => '137',
                'suffix' => 'a',
                'zipcode' => '3014 GJ',
                'city' => 'Rotterdam',
                'state' => 'Zuid-Holland',
                'country' => 'NL',
            ],
            'email' => 'support@openprovider.nl',
            'locale' => 'el_GR',
            'additionalData' => [
                'birthCity' => 'Amsterdam',
                'birthDate' => '1971-02-14',
                'socialSecurityNumber' => '771268635',
                'companyRegistrationNumber' => '115372'
            ],
            'extensionAdditionalData' => [
                [
                    'name' => 'us',
                    'data' => [
                        'nexusCategory' => 'C31',
                        'applicantPurpose' => 'P1'
                    ]
                ],
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['handle' => 'JH000001-US']]], $customer);
    }

    /** @test */
    public function it_can_do_a_delete_customer_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $customer = $this->openProvider->customers()->deleteCustomer([
            'handle' => 'AJ001927-NL'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $customer);
    }

    /** @test */
    public function it_can_do_a_modify_customer_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $customer = $this->openProvider->customers()->modifyCustomer([
            'handle' => 'AJ001927-NL',
            'phone' => [
                'countryCode' => '+31',
                'areaCode' => '10',
                'subscriberNumber' => '4482299'
            ],
            'fax' => [
                'countryCode' => '+31',
                'areaCode' => '10',
                'subscriberNumber' => '2440250'
            ],
            'address' => [
                'street' => 'Nieuwe Binnenweg',
                'number' => '137',
                'suffix' => 'a',
                'zipcode' => '3014 GJ',
                'city' => 'Rotterdam',
                'state' => 'Zuid-Holland',
                'country' => 'NL',
            ],
            'email' => 'support@openprovider.nl',
            'additionalData' => [
                'birthCity' => 'Amsterdam',
                'birthDate' => '1971-02-14',
                'socialSecurityNumber' => '771268635',
                'companyRegistrationNumber' => '115372'
            ],
            'extensionAdditionalData' => [
                [
                    'name' => 'pro',
                    'data' => [
                        'profession' => 'software developer',
                        'authorityName' => 'openprovider',
                        'licenseNumber' => '12345678',
                        'authorityUrl' => 'http://openprovider.com'
                    ]
                ],
                [
                    'name' => 'jobs',
                    'data' => [
                        'website' => 'http://openprovider.com'
                    ]
                ]
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $customer);
    }

    /** @test */
    public function it_can_do_a_retrieve_customer_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><companyName>Hosting Unlimited</companyName><name><initials>J.B.</initials><firstName>John</firstName><prefix>van</prefix><lastName>Halen</lastName></name><gender>M</gender><phone><countryCode>+8</countryCode><areaCode>383</areaCode><subscriberNumber>1231212</subscriberNumber></phone><fax><countryCode>+8</countryCode><areaCode>383</areaCode><subscriberNumber>1231213</subscriberNumber></fax><address><street>Main Street</street><number>2</number><zipcode>630060</zipcode><city>Washington</city><country>US</country><suffix>a</suffix></address><email>info@openprovider.nl</email><handle>JH000001-US</handle><comments></comments></data></reply></openXML>'));

        $customer = $this->openProvider->customers()->retrieveCustomer([
            'handle' => 'AJ001927-NL'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['companyName' => 'Hosting Unlimited', 'name' => ['initials' => 'J.B.', 'firstName' => 'John', 'prefix' => 'van', 'lastName' => 'Halen'], 'gender' => 'M', 'phone' => ['countryCode' => '+8', 'areaCode' => '383', 'subscriberNumber' => '1231212'], 'fax' => ['countryCode' => '+8', 'areaCode' => '383', 'subscriberNumber' => '1231213'], 'address' => ['street' => 'Main Street', 'number' => '2', 'zipcode' => '630060', 'city' => 'Washington', 'country' => 'US', 'suffix' => 'a'], 'email' => 'info@openprovider.nl', 'handle' => 'JH000001-US', 'comments' => []]]], $customer);
    }

    /** @test */
    public function it_can_do_a_search_customer_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><id>156384</id><companyName>Hosting Unlimited</companyName><name><initials>J.B.</initials><firstName>John</firstName><prefix>van</prefix><lastName>Halen</lastName></name><gender>M</gender><phone><countryCode>+8</countryCode><areaCode>383</areaCode><subscriberNumber>1231212</subscriberNumber></phone><fax><countryCode>+8</countryCode><areaCode>383</areaCode><subscriberNumber>1231213</subscriberNumber></fax><address><street>Main Street</street><number>2</number><zipcode>630060</zipcode><city>Washington</city><country>US</country><suffix>a</suffix></address><email>info@openprovider.nl</email><handle>JH000001-US</handle><comments></comments></item></array></results><total>1</total></data></reply></openXML>'));

        $customers = $this->openProvider->customers()->searchCustomer([
            'offset' => 0,
            'limit' => 25,
            'emailPattern' => '*@openprovider.nl',
            'lastNamePattern' => 'Smith',
            'companyNamePattern' => '*prov*'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['id' => '156384', 'companyName' => 'Hosting Unlimited', 'name' => ['initials' => 'J.B.', 'firstName' => 'John', 'prefix' => 'van', 'lastName' => 'Halen'], 'gender' => 'M', 'phone' => ['countryCode' => '+8', 'areaCode' => '383', 'subscriberNumber' => '1231212'], 'fax' => ['countryCode' => '+8', 'areaCode' => '383', 'subscriberNumber' => '1231213'], 'address' => ['street' => 'Main Street', 'number' => '2', 'zipcode' => '630060', 'city' => 'Washington', 'country' => 'US', 'suffix' => 'a'], 'email' => 'info@openprovider.nl', 'handle' => 'JH000001-US', 'comments' => []]]], 'total' => '1']]], $customers);
    }
}