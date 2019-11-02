<?php

use Codeception\Test\Unit;

class AgencyManagerClientTest extends Unit
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
        $result = $this->tester->getApi()->agencyManagerClient()->post(1, 2, ["access_type" => "full_access"]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->agencyManagerClient()->delete(1, 2);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }
}