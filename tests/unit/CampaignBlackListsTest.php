<?php

class CampaignBlackListsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->campaignBlackLists()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->campaignBlackLists()->post([
            "name" => "Мой первый список запрещенных url адресов",
            "type" => "domain",
            "place_list" => [
                "https://yandex.ru",
                "https://google.com"
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}