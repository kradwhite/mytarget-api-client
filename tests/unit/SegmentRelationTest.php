<?php

use Codeception\Test\Unit;

class SegmentRelationTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->segmentRelation()->post(243, 30, [
            "params" => [
                "left" => 359,
                "right" => 1,
                "type" => "negative"
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'SegmentRelation');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->segmentRelation()->delete(243, 30);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'SegmentRelation');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}