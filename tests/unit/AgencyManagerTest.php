<?php

use Codeception\Test\Unit;

class AgencyManagerTest extends Unit
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
        $result = $this->tester->getApi()->agencyManager()->post(1, [
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
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'validation_failed');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->agencyManager()->delete(1);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }
}