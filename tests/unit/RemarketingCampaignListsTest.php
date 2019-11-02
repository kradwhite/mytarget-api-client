<?php

use Codeception\Test\Unit;

class RemarketingCampaignListsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingCampaignLists()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_datasource_campaign');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingCampaignLists()->post([]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_datasource_campaign');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}