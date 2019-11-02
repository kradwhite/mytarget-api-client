<?php

use Codeception\Test\Unit;

class ManagerClientTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->managerClient()->post(17668, [
            "user" => [
                "additional_emails" => ['test@mail.ru'],
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