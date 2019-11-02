<?php

use Codeception\Test\Unit;

class RemarketingOkGroupsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingOkGroups()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingOkGroups()->post(["object_id" => 3450439092, "type" => "group"]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'validation_failed');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}