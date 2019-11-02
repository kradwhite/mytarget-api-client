<?php

use Codeception\Test\Unit;

class UserTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->user()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('username', $result);
        $this->assertArrayHasKey('firstname', $result);
        $this->assertArrayHasKey('lastname', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}