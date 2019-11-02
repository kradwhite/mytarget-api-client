<?php

use Codeception\Test\Unit;

class LocalGeoTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->localGeo()->post(1234, []);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->localGeo()->delete(1234);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}