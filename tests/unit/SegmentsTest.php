<?php

use Codeception\Test\Unit;

class SegmentsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->segments()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->segments()->post([
            "name" => "сегмент",
            "pass_condition" => 2,
            "relations" => [
                [
                    "object_type" => "remarketing_counter",
                    "params" => ["goal_id" => "uss", "right" => 0, "type" => "positive", "counter_id" => 2500001, "left" => 365]
                ],
                [
                    "object_type" => "segment",
                    "object_id" => 1166
                ]
            ],
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'validation_failed');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}