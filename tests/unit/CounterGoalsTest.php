<?php

use Codeception\Test\Unit;

class CounterGoalsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->counterGoals()->get(2500000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->counterGoals()->post(2500000, [
            'substr' => 'order_accepted',
            'value' => 45,
            'name' => 'Совершил покупку',
            'condition' => 'jse'
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}