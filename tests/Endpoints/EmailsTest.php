<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class EmailsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_restart_customer_email_verification_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $email = $this->openProvider->emails()->restartCustomerEmailVerification([
            'email' => 'support@openprovider.nl'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $email);
    }

    /** @test */
    public function it_can_do_a_search_email_verification_domain_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><email>support1@openprovider.nl</email><handle>AB012345-NL</handle><status>verified</status><description>-</description><expirationDate>0000-00-00 00:00:00</expirationDate><domain>openprovider1.com</domain><isSuspended>0</isSuspended></item><item><email>support2@openprovider.nl</email><handle>AB112345-NL</handle><status>failed</status><description>expired</description><expirationDate>0000-00-00 00:00:00</expirationDate><domain>openprovider2.com</domain><isSuspended>1</isSuspended></item><item><email>support3@openprovider.nl</email><handle>AB212345-NL</handle><status>in progress</status><description>-</description><expirationDate>2015-05-25 16:36:32</expirationDate><domain></domain><isSuspended>0</isSuspended></item></array></results><total>3</total></data></reply></openXML>'));

        $emails = $this->openProvider->emails()->searchEmailVerificationDomain([
            'email' => 'support@openprovider.com',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['email' => 'support1@openprovider.nl', 'handle' => 'AB012345-NL', 'status' => 'verified', 'description' => '-', 'expirationDate' => '0000-00-00 00:00:00', 'domain' => 'openprovider1.com', 'isSuspended' => '0'], 1 => ['email' => 'support2@openprovider.nl', 'handle' => 'AB112345-NL', 'status' => 'failed', 'description' => 'expired', 'expirationDate' => '0000-00-00 00:00:00', 'domain' => 'openprovider2.com', 'isSuspended' => '1'], 2 => ['email' => 'support3@openprovider.nl', 'handle' => 'AB212345-NL', 'status' => 'in progress', 'description' => '-', 'expirationDate' => '2015-05-25 16:36:32', 'domain' => [], 'isSuspended' => '0']]]], 'total' => '3']]], $emails);
    }

    /** @test */
    public function it_can_do_a_start_customer_email_verification_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>10</id></data></reply></openXML>'));

        $email = $this->openProvider->emails()->startCustomerEmailVerification([
            'email' => 'support@openprovider.nl'
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '10']]], $email);
    }
}