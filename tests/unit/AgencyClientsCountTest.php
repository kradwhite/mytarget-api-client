<?php

use Codeception\Test\Unit;

class AgencyClientsCountTest extends Unit
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
        $result = $this->tester->getApi()->agencyClientsCount()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('active', $result);
        $this->assertArrayHasKey('blocked', $result);
        $this->assertArrayHasKey('deleted', $result);
    }
}