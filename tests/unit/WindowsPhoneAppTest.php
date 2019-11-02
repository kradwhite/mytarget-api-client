<?php

class WindowsPhoneAppTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->windowsPhoneApp()->get('2638b778-5eab-45f1-a511-a08e1dbde751');
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