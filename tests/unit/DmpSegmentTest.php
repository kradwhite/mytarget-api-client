<?php

use Codeception\Test\Unit;

class DmpSegmentTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->dmpSegment()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
        $this->assertEquals($result['items'][0]['object_id'], 6717);
        $this->assertEquals($result['items'][0]['id'], 200);
        $this->assertEquals($result['items'][0]['key'], 'x5uKNrMRyI9qhjLG4KR0g6WWC7aKYf');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}