<?php

use Codeception\Test\Unit;

class AuditPixelCheckTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPost()
    {
        $result = $this->tester->getApi()->auditPixelCheck()->post([
            [
                "audit_pixel" => "https://top-fwz1.mail.ru/tracker?id=2930776;e=RG%3A/trg-pixel-2812993-1507041739095"
            ],
            [
                "audit_pixel" => "https://top-fwz1.mail.ru/tracker?id=2897541;e=RG%3A/trg-pixel-2812993-1506420919107"
            ],
            [
                "audit_pixel" => "https://top-fwz1.mail.ru/tracker?id=2897541;e=RG%3A/trg-pixel-2812993-1506417174594"
            ]
        ]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('count', $result);
        $this->assertArrayHasKey('items', $result);
    }
}