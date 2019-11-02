<?php

class GoogleAppTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->googleApp()->get('com.bscotch.quadropus');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('type', $result);
        $this->assertEquals($result['id'], 182);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->googleApp()->post('com.bscotch.quadropus');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('type', $result);
        $this->assertEquals($result['id'], 182);
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}