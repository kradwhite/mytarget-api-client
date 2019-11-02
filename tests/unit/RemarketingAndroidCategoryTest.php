<?php

use Codeception\Test\Unit;

class RemarketingAndroidCategoryTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testDelete()
    {
        $result = $this->tester->getApi()->remarketingAndroidCategory()->delete(102);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'RemarketingAndroidCategory');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}