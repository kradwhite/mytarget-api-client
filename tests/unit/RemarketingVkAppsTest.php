<?php

use Codeception\Test\Unit;

class RemarketingVkAppsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingVkApps()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingVkApps()->post(["object_id" => 36764]);
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