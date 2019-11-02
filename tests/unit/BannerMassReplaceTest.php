<?php

class BannerMassReplaceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->bannerMassReplace()->post([
            "ids" => [34537453, 34537454],
            "change_from" => "Хотите купить",
            "change_to" => "Срочно продаем",
            "field" => "textblocks"
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}