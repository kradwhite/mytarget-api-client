<?php

class BannerMassActionTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPost()
    {
        $result = $this->tester->getApi()->bannerMassAction()->post([
            [
                "id" => 111,
                "status" => "blocked",
            ],
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'unknown_banners');
    }
}