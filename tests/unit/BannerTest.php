<?php

use Codeception\Test\Unit;

class BannerTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->banner()->get(23617841);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->banner()->post(23617841, ['status' => 'blocked']);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->banner()->delete(23617841);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}