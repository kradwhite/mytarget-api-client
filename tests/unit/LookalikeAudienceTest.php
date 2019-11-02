<?php

use Codeception\Test\Unit;

class LookalikeAudienceTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->lookalikeAudience()->get(2828);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_lookalike_audiences');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->lookalikeAudience()->post(2828, []);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_lookalike_audiences');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->lookalikeAudience()->delete(2828);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_lookalike_audiences');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}