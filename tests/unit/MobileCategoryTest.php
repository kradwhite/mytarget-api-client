<?php

class MobileCategoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->mobileCategory()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}