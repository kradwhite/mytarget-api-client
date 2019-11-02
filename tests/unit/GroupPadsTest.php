<?php

use Codeception\Test\Unit;

class GroupPadsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->groupPads()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], ['create_pads', 'view_stats']);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->groupPads()->post([
            "description" => "Новая площадка",
            "url" => "https://play.google.com/store/apps/details?id=com.example",
            "platform_id" => 6123,
            "filters" => [
                "deny_topics" => ["dating"]
            ],
            "pads" => [
                [
                    "description" => "Новый блок",
                    "format_id" => 6125,
                    "filters" => [
                        "allow_image_types" => ["static"]
                    ],
                    "shows_period" => "day"
                ]
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'create_pads');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}