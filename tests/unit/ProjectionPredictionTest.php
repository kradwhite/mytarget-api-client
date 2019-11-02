<?php

class ProjectionPredictionTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->projectionPrediction()->post([
            "package_ids" => [959, 999],
            "targetings" => [
                "pads" => [24567, 24568, 33649, 33652]
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('error', $result);
        $this->assertArrayHasKey('code', $result['error']);
        $this->assertEquals($result['error']['code'], 'validation_failed');
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}