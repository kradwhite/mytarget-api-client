<?php

class SubscriptionsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
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
        $result = $this->tester->getApi()->subscriptions()->post([
            "callback_url" => "http://mysuperhost.com/callback",
            "resource" => "CAMPAIGN",
            "resource_id" => 123
        ]);
        $this->assertEquals($result, 'Resource CAMPAIGN with id 123 not found.');
    }

    public function testGet()
    {
        $result = $this->tester->getApi()->subscriptions()->get();
        $this->assertIsArray($result);
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->subscriptions()->delete(123);
        $this->assertEmpty($result);
    }
}