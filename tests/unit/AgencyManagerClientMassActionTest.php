<?php

use Codeception\Test\Unit;

class AgencyManagerClientMassActionTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPost()
    {
        $result = $this->tester->getApi()->agencyManagerClientMassAction()->post(1, [["access_type" => "full_access"]]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }
}