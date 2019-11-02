<?php

class ContentTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->content()->post('static', '', ["width" => 1612, "height" => 980]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'access_denied');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}