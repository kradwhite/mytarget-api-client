<?php

use Codeception\Test\Unit;

class BranchClientsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->branchClients()->get();
        $this->assertIsArray($result);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->branchClients()->post([
            "user" => [
                "account" => [
                    "type" => "physical"
                ],
                "additional_emails" => ['test@mail.ru'],
                "additional_info" => [
                    "client_info" => "Заметка",
                    "client_name" => "Василий Иванов",
                ]
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}