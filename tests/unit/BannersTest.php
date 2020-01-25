<?php

class BannersTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $api = $this->tester->getApi();
        $result = $api->banners()->get();
        $this->assertIsArray($result);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertNotEmpty($api->getLastResponseHeaders());
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}