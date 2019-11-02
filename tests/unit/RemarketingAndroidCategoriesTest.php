<?php

use Codeception\Test\Unit;

class RemarketingAndroidCategoriesTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->remarketingAndroidCategories()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->remarketingAndroidCategories()->post(['category_id' => 10]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
        $this->assertEquals($result['id'], 2);
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}