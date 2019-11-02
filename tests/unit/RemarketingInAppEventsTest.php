<?php

use Codeception\Test\Unit;

class RemarketingInAppEventsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingInAppEvents()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('count', $result);
        $this->assertArrayHasKey('items', $result);
        $this->assertArrayHasKey('limit', $result);
        $this->assertArrayHasKey('offset', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}