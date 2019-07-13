<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class EmailsTemplatesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_email_template_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>1404</id></data></reply></openXML>'));

        $email = $this->openProvider->emailstemplates()->createEmailTemplate([
            'name' => 'Demo template',
            'group' => 'ive',
            'isDefault' => true,
            'isActive' => true,
            'locale' => ['nl_NL'],
            'fields' => [
                [
                    'name' => 'senderEmail',
                    'value' => 'myemail@mycompany.eu',
                ],
                [
                    'name' => 'confirmUrl',
                    'value' => 'http://icann-verification.registrar.eu/?email=%%email%%&authCode=%%authCode%%',
                ],
                [
                    'name' => 'resellerName',
                    'value' => 'demo Co',
                ],
                [
                    'name' => 'subject',
                    'value' => 'Initial E-mail verification',
                ],
                [
                    'name' => 'body',
                    'value' => '%%confirmUrl%% and %%respondDate%%',
                ],
                [
                    'name' => 'reminderSubject',
                    'value' => 'Email verification reminder',
                ],
                [
                    'name' => 'reminderBody',
                    'value' => '%%confirmUrl%% and %%respondDate%%',
                ],
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '1404']]], $email);
    }

    /** @test */
    public function it_can_do_a_delete_email_template_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $email = $this->openProvider->emailstemplates()->deleteEmailTemplate([
            'id' => 1409,
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $email);
    }

    /** @test */
    public function it_can_do_a_modify_email_template_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc></reply></openXML>'));

        $email = $this->openProvider->emailstemplates()->modifyEmailTemplate([
            'id' => 1234,
            'name' => 'Demo template',
            'isDefault' => true,
            'isActive' => true,
            'locale' => ['nl_NL'],
            'fields' => [
                [
                    'name' => 'senderEmail',
                    'value' => 'myemail@mycompany.eu',
                ],
                [
                    'name' => 'confirmUrl',
                    'value' => 'http://icann-verification.registrar.eu/?email=%%email%%&authCode=%%authCode%%',
                ],
                [
                    'name' => 'resellerName',
                    'value' => 'demo Co',
                ],
                [
                    'name' => 'subject',
                    'value' => 'Initial E-mail verification',
                ],
                [
                    'name' => 'body',
                    'value' => '%%confirmUrl%% and %%respondDate%%',
                ],
                [
                    'name' => 'reminderSubject',
                    'value' => 'Email verification reminder',
                ],
                [
                    'name' => 'reminderBody',
                    'value' => '%%confirmUrl%% and %%respondDate%%',
                ],
            ],
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => []]], $email);
    }

    /** @test */
    public function it_can_do_a_search_email_template_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><id>733</id><name>Custom Template (en_GB)</name><group>ive</group><isDefault></isDefault><isActive>1</isActive><tags/><fields><array><item><name>body</name><value>Body of the email</value></item><item><name>reminderBody</name><value>Body of reminder email</value></item><item><name>subject</name><value>Request for e-mail address verification</value></item><item><name>reminderSubject</name><value>[REMINDER] Request for e-mail address verification</value></item><item><name>confirmUrl</name><value>http://icann-verification.registrar.eu/?email=%%email%%&amp;authCode=%%authCode%%</value></item><item><name>resellerName</name><value>MyCompany</value></item><item><name>senderEmail</name><value>support@mycompany.net</value></item></array></fields><locale><array><item>en_GB</item></array></locale></item></array></results><total>5</total></data></reply></openXML>'));

        $email = $this->openProvider->emailstemplates()->searchEmailTemplate([
            'group' => 'ive',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['id' => '733', 'name' => 'Custom Template (en_GB)', 'group' => 'ive', 'isDefault' => [], 'isActive' => '1', 'tags' => [], 'fields' => ['array' => ['item' => [0 => ['name' => 'body', 'value' => 'Body of the email'], 1 => ['name' => 'reminderBody', 'value' => 'Body of reminder email'], 2 => ['name' => 'subject', 'value' => 'Request for e-mail address verification'], 3 => ['name' => 'reminderSubject', 'value' => '[REMINDER] Request for e-mail address verification'], 4 => ['name' => 'confirmUrl', 'value' => 'http://icann-verification.registrar.eu/?email=%%email%%&authCode=%%authCode%%'], 5 => ['name' => 'resellerName', 'value' => 'MyCompany'], 6 => ['name' => 'senderEmail', 'value' => 'support@mycompany.net']]]], 'locale' => ['array' => ['item' => 'en_GB']]]]], 'total' => '5']]], $email);
    }
}