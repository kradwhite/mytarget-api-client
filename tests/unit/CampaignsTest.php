<?php

class CampaignsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->campaigns()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->campaigns()->post([
            "name" => "Моя новая кампания",
            "status" => "active",
            "date_start" => "2018-04-01 00:00:00",
            "date_end" => "2018-04-15 00:00:00",
            "autobidding_mode" => "second_price",
            "budget_limit_day" => "1000",
            "budget_limit" => "5000",
            "mixing" => "fastest",
            "price" => "642.12",
            "age_restrictions" => "18+",
            "banner_uniq_shows_limit" => 2130,
            "uniq_shows_period" => "week",
            "uniq_shows_limit" => 100,
            "audit_viewability" => "moat",
            "enable_utm" => "False",
            "package_id" => 449,
            "objective" => "playersengagement",
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
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