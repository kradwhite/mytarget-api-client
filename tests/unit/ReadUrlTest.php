<?php

class ReadUrlTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->readUrl()->get(13123170);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
        $this->assertEquals($result['error']['code'], 'not_found');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}