<?php

class CampaignBlackListTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->campaignBlackList()->post(1234, [
            "name" => "Обновленный список запрещенных мобильных приложений",
            "type" => "mobile_app",
            "place_list" => [
                "ru.mail.games.android.luckyfields"
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->campaignBlackList()->delete(1234);
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