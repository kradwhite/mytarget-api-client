<?php

use Codeception\Test\Unit;

class RemarketingMmAppTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingMmApp()->delete(378);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingMmApp');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}