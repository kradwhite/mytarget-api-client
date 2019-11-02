<?php

use Codeception\Test\Unit;

class BranchClientTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->branchClient()->post(17668, [
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
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}