<?php

use Codeception\Test\Unit;

class RemarketingUsersListsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingUsersLists()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingUsersLists()->post("", ["name" => "Лайки и комментарии в ВК", "type" => "vk"]);
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