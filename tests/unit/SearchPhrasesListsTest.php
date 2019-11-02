<?php

class SearchPhrasesListsTest extends \Codeception\Test\Unit
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
        $result = $this->tester->getApi()->searchPhrasesLists()->get();
        $this->assertEquals($result, 'Not found');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->searchPhrasesLists()->post('my_test_list', 'one,12d,two,12d,three,12d', 1234234);
        $this->assertEquals($result, 'Not found');
    }
}