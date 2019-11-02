<?php

class TransactionTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->transaction()->post('to', 1234567, 10000.00);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}