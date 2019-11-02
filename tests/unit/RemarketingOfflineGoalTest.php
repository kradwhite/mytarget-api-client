<?php

use Codeception\Test\Unit;

class RemarketingOfflineGoalTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingOfflineGoal()->post(34235, "", ["name" => "Список посещений магазина"]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'OfflineGoals_update_permission');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}