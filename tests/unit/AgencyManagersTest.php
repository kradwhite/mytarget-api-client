<?php

use Codeception\Test\Unit;

class AgencyManagersTest extends Unit
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
        $result = $this->tester->getApi()->agencyManagers()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('count', $result);
        $this->assertArrayHasKey('items', $result);
        $this->assertArrayHasKey('limit', $result);
        $this->assertArrayHasKey('offset', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->agencyManagers()->post([
            "user" => [
                "id" => 17668,
                "username" => "Василий Иванов",
                "additional_info" => [
                    "client_name" => "Василий Иванов",
                ]
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'validation_failed');
    }
}