<?php

use Codeception\Test\Unit;

class RemarketingPriceListsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingPriceLists()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingPriceLists()->post([
            "name" => "Прайс-лист",
            "feed_id" => 5,
            "export_url" => "http://user:password@yourshop123.ru/sources/items.xml",
            "shop_id" => 250000
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'validation_failed');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}