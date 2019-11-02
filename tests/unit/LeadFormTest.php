<?php

class LeadFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->leadForm()->get();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
        $this->assertArrayHasKey('count', $result);
        $this->assertArrayHasKey('offset', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}