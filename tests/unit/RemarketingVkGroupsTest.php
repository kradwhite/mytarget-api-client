<?php

use Codeception\Test\Unit;

class RemarketingVkGroupsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingVkGroups()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingVkGroups()->post(["object_id" => 1]);
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