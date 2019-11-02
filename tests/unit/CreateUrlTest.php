<?php

class CreateUrlTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->CreateUrl()->post([
            "url" => "http://example.com/123456789?1=1"
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}