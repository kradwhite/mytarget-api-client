<?php 
class ThrottlingTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGet()
    {
        $result = $this->tester->getApi()->throttling()->get();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}