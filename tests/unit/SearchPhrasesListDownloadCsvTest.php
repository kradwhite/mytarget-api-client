<?php

class SearchPhrasesListDownloadCsvTest extends \Codeception\Test\Unit
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
        $result = $this->tester->getApi()->searchPhrasesListDownloadCsv()->get(112);
        $this->assertEquals($result, 'Not found');
    }
}