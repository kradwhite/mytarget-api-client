<?php

use Codeception\Test\Unit;

class LocalGeosTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testGet()
    {
        $result = $this->tester->getApi()->localGeos()->get('id');
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertArrayHasKey('items', $result);
    }

    public function testPost()
    {
        $result = $this->tester->getApi()->localGeos()->post([
            'name' => 'Новый список локальной географии',
            'regions' => [
                [
                    "lat" => 55.75583,
                    "lng" => 37.6173,
                    "radius" => 3000,
                    "label" => "Центр Москвы",
                    "address" => "Точный адрес"
                ]
            ],
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
    }

    // tests

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}