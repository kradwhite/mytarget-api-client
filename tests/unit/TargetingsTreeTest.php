<?php

class TargetingsTreeTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->targetingsTree()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('interests_soc_dem', $result);
        $this->assertArrayHasKey('interests_short', $result);
        $this->assertArrayHasKey('interests_stable', $result);
        $this->assertArrayHasKey('interests', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}