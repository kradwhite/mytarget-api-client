<?php

use Codeception\Test\Unit;

class LookalikeAudiencesTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->lookalikeAudiences()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_lookalike_audiences');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->lookalikeAudiences()->post([]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_lookalike_audiences');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}