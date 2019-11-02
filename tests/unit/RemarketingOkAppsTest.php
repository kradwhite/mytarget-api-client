<?php

use Codeception\Test\Unit;

class RemarketingOkAppsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingOkApps()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingOkApps()->post(["object_id" => 345043]);
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