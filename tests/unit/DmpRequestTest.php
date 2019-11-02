<?php

use Codeception\Test\Unit;

class DmpRequestTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testPost()
    {
        $result = $this->tester->getApi()->dmpRequest()->post([
            'dmp_user_id' => 2000000,
            'comment' => 'Прошу предоставить доступ к сегменту DMP/Покупавшие в Марьино',
            'reply_email' => 'test@example.com',
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