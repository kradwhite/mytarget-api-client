<?php 
class StatisticsInAppTest extends \Codeception\Test\Unit
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
        $result = $this->tester->getApi()->statisticsInApp()->get('banners', 123, '2019-10-01', '2019-10-30');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals($result['error']['code'], 'WRONG_BANNERS');
    }
}