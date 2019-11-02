<?php

use Codeception\Test\Unit;

class RemarketingUsersListTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingUsersList()->get(2005000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingUsersList');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingUsersList()->post(2005000, ["name" => "Новое название списка"]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingUsersList');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingUsersList()->delete(2005000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingUsersList');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}