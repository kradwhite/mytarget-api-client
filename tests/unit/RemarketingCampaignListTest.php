<?php

use Codeception\Test\Unit;

class RemarketingCampaignListTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingCampaignList()->post(12345, []);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_datasource_campaign');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingCampaignList()->delete(12345);
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