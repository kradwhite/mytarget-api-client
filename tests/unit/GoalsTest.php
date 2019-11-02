<?php

use Codeception\Test\Unit;

class GoalsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->goals()->get();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}