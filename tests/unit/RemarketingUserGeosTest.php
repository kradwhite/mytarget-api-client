<?php

use Codeception\Test\Unit;

class RemarketingUserGeosTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingUserGeos()->get(2);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingUserGeo');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingUserGeos()->post(2, ["name" => "Пользователи из Курска и Владикавказа"]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingUserGeo');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingUserGeos()->delete(2);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingUserGeo');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}