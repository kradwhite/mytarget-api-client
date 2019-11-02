<?php

class VkGroupTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->vkGroup()->get('Тестовая группа');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('items', $result);
        $this->assertArrayHasKey('count', $result);
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}