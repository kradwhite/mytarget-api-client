<?php

class AppleAppTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGet()
    {
        $result = $this->tester->getApi()->appleApp()->get(535176909);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('type', $result);
        $this->assertEquals($result['id'], 5);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->appleApp()->post(535176909);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('type', $result);
        $this->assertEquals($result['id'], 5);
    }
}