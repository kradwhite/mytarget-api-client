<?php

class BannerFormatsTest extends \Codeception\Test\Unit
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
    public function testGet()
    {
        $result = $this->tester->getApi()->bannerFormats()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }
}