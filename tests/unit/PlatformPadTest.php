<?php

use Codeception\Test\Unit;

class PlatformPadTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->platformPad()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], ['create_pads', 'moderate_pads']);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}