<?php

use Codeception\Test\Unit;
use GuzzleHttp\Exception\GuzzleException;

class GeoCoverageTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $this->tester->expectThrowable(GuzzleException::class, function () {
            $result = $this->tester->getApi()->geoCoverage()->post([
                [
                    'lat' => 55.755826,
                    'lng' => 37.6172999,
                    'loc_type' => 'all',
                    'radius' => 3000,
                    'type' => 'usual'
                ]
            ]);
        });
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}