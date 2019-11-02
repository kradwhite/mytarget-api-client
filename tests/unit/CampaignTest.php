<?php

class CampaignTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->campaign()->get(6617841);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->campaign()->post(6617841, ['name' => 'new name']);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->campaign()->delete(6617841);
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