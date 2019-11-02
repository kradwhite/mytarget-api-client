<?php

use Codeception\Test\Unit;

class RemarketingCounterTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingCounter()->get(2000000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Counter');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingCounter()->post(2000000, []);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Counter');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingCounter()->delete(2000000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Counter');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}