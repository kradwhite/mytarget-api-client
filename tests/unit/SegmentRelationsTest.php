<?php

use Codeception\Test\Unit;

class SegmentRelationsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->segmentRelations()->get(243);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'SegmentRelation');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->segmentRelations()->post(243, ['items' => [
            [
                "object_type" => "remarketing_counter",
                "params" => [
                    "goal_id" => "",
                    "right" => 0,
                    "type" => "positive",
                    "source_id" => 141766795,
                    "left" => 365
                ]
            ]
        ]]);
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