<?php

use Codeception\Test\Unit;

class RemarketingOkAppTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingOkApp()->delete(378);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingOkApp');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}