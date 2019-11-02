<?php

use Codeception\Test\Unit;

class RemarketingPriceListTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingPriceList()->get(2000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Pricelist');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingPriceList()->post(2000, []);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Pricelist');
    }

    // tests

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingPriceList()->delete(2000);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'Pricelist');
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}