<?php

use Codeception\Test\Unit;

class RemarketingUserGeoTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingUserGeo()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingUserGeo()->post([
            "name" => "Пользователи из Курска и Вадикавказа",
            "user_geo_ids" => [3, 4]
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