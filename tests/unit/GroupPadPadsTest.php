<?php

use Codeception\Test\Unit;

class GroupPadPadsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->groupPadPads()->get(4567);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'create_pads');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->groupPadPads()->post(4567, [
            "description" => "Новый блок",
            "format_id" => 6186,
            "filters" => [
                "allow_image_types" => ["static"],
                "deny_image_types" => ["video"]
            ],
            "shows_period" => "day",
            "shows_interval" => 7200,
            "dummy_html" => "<script type='text/javascript'></script>",
            "shows_limit" => 1
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