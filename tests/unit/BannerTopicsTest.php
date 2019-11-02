<?php

use Codeception\Test\Unit;

class BannerTopicsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->bannerTopics()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'view_banner_topics');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}