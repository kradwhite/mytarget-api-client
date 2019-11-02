<?php

class TransactionGroupsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->transactionGroups()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('limit', $result);
        $this->assertArrayHasKey('offset', $result);
        $this->assertArrayHasKey('items', $result);
        $this->assertArrayHasKey('count', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}