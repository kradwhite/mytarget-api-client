<?php

use Codeception\Test\Unit;

class RemarketingCountersTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingCounters()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingCounters()->post([
            "name" => "Новый счетчик",
            "url" => "http://example.com",
            "email" => "test@example.com",
            "password" => "12345678"
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('counter_id', $result);
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}