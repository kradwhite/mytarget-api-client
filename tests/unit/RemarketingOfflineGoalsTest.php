<?php

use Codeception\Test\Unit;

class RemarketingOfflineGoalsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingOfflineGoals()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'OfflineGoalses_read_permission');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingOfflineGoals()->post("", [
            "name" => "Список посещений магазина",
            "attribution_period" => 90,
            "type" => "email"
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'OfflineGoalses_create_permission');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}