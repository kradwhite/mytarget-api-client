<?php 
class SearchPhrasesListTest extends \Codeception\Test\Unit
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
        $result = $this->tester->getApi()->searchPhrasesList()->get(112);
        $this->assertEquals($result, 'Not found');
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->searchPhrasesList()->post(112, 'new name');
        $this->assertEquals($result, 'Not found');
    }

    public function testPut()
    {
        $result = $this->tester->getApi()->searchPhrasesList()->put(112, '1234,5678');
        $this->assertEquals($result, 'Not found');
    }

    public function testDelete()
    {
        $result = $this->tester->getApi()->searchPhrasesList()->delete(112);
        $this->assertEquals($result, 'Not found');
    }
}