<?php

use Codeception\Test\Unit;

class RemarketingVkGroupTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingVkGroup()->delete(935);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingVkGroup');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}