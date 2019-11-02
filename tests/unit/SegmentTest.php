<?php

use Codeception\Test\Unit;

class SegmentTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->segment()->get(243);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Segment');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->segment()->post(243, ["name" => "сегмент v2", "pass_condition" => 1]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Segment');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->segment()->delete(243);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Segment');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}