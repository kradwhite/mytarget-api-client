<?php

use Codeception\Test\Unit;

class GroupPadTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->groupPad()->get(4567);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'create_pads');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->groupPad()->post(4567, [
            "status" => "blocked",
            "description" => "New description",
            "comment" => "Comment",
            "filters" => [
                "deny_topics" => ["dating"]
            ],
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