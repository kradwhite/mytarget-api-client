<?php

use Codeception\Test\Unit;

class AudienceScoreStatsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGet()
    {
        $result = $this->tester->getApi()->audienceScoreStats()->get(123);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }
}