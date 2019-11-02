<?php

use Codeception\Test\Unit;

class AgencyManagerClientsTest extends Unit
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
    public function testGet()
    {
        $result = $this->tester->getApi()->agencyManagerClients()->get(123);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'agencymanagerclientresource');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->agencyManagerClients()->post(123, [
            "access_type" => "full_access",
            "user" => [
                "username" => "Василий Иванов",
                "id" => 17668,
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'agencymanagerclientresource');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->agencyManagerClients()->delete(123);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'agencymanagerclientresource');
    }
}