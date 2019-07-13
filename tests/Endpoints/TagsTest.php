<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class TagsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_create_tag_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $tags = $this->openProvider->tags()->createTag([
            'key' => 'customer',
            'value' => 'value',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $tags);
    }

    /** @test */
    public function it_can_do_a_delete_tag_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data>1</data></reply></openXML>'));

        $tags = $this->openProvider->tags()->deleteTag([
            'key' => 'customer',
            'value' => 'value',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => '1']], $tags);
    }

    /** @test */
    public function it_can_do_a_search_tag_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><key>customer</key><value>companyA</value></item></array></results><total>1</total></data></reply></openXML>'));

        $tags = $this->openProvider->tags()->searchTag([
            'key' => 'customer',
            'value' => 'customerA',
        ]);

        $this->assertArraySubset(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => ['key' => 'customer', 'value' => 'companyA']]], 'total' => '1']]], $tags);
    }
}