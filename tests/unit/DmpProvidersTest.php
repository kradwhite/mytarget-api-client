<?php

use Codeception\Test\Unit;

class DmpProvidersTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->dmpProviders()->get();
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}