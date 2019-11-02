<?php

use Codeception\Test\Unit;

class ReservedAmountsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->reservedAmounts()->get('123;456');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('reserved_amounts', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}