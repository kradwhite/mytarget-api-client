<?php

use Codeception\Test\Unit;

class CounterGoalTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->counterGoal()->post(2500000, 42, []);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
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