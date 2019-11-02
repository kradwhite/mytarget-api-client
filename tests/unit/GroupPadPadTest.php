<?php

use Codeception\Test\Unit;

class GroupPadPadTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->groupPadPad()->get(4567, 4321);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'create_pads');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->groupPadPad()->post(4567, 4321, [
            "status" => "blocked",
            "description" => "Новое описание",
            "comment" => "Новый комментарий",
            "shows_limit" => 10,
            "shows_period" => "week",
            "shows_interval" => 7200,
            "dummy_html" => "<script type='text/javascript'></script>",
            "filters" => [
                "allow_image_types" => ["video"],
                "deny_image_types" => ["static"]
            ],
            "block_cpm_limit" => 50
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