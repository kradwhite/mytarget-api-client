<?php

use Codeception\Test\Unit;

class RemarketingMmAppsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingMmApps()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingMmApps()->post([
            "object_id" => 259003
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}