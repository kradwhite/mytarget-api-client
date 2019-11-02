<?php

use Codeception\Test\Unit;

class SegmentRelationsDeleteTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testDelete()
    {
        $result = $this->tester->getApi()->segmentRelationsDelete()->delete(243, '30,31');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'SegmentRelation');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}