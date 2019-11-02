<?php

use Codeception\Test\Unit;

class AgencyClientsTest extends Unit
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
        $result = $this->tester->getApi()->agencyClients()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('count', $result);
        $this->assertArrayHasKey('items', $result);
        $this->assertArrayHasKey('limit', $result);
        $this->assertArrayHasKey('offset', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->agencyClients()->post([
            "access_type" => "full_access",
            "user" => [
                "additional_emails" => ['test@mail.ru'],
                "additional_info" => [
                    "client_info" => "Заметка",
                    "client_name" => "Василий Иванов",
                ]
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('user', $result);
        $this->assertArrayHasKey('id', $result['user']);
        $this->assertArrayHasKey('username', $result['user']);
    }
}