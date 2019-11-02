<?php

use Codeception\Test\Unit;

class RemarketingVkAppTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingVkApp()->delete(935);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingVkApp');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}