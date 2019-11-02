<?php

class CampaignMassActionTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->campaignMassAction()->post([
            [
                'id' => 1234,
                'status' => 'active',
                "price" => 2434
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'unknown_campaigns');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}