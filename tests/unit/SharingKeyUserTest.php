<?php

use Codeception\Test\Unit;

class SharingKeyUserTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->sharingKeyUser()->post('abcdef');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'not_found');
        $this->assertEquals($result['error']['resource'], 'SharingKeyUser');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->sharingKeyUser()->delete('abcdef');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
        $this->assertEquals($result['error']['required_permission'], 'use_share_source');
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}