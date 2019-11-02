<?php

use Codeception\Test\Unit;

class SharingKeyTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->sharingKey()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_share_source');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->sharingKey()->post([
            "sources" => [
                [
                    "object_type" => "segment",
                    "object_id" => 300
                ]
            ],
            "send_email" => true,
            "users" => [["username" => "to.share@mail.ru"]]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_share_source');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}