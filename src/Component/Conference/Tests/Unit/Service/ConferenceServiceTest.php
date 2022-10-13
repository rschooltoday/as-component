<?php

namespace Rst\AsComponent\Conference\Tests\Unit\Service;


use PHPUnit\Framework\TestCase;
use Rst\AsComponent\Conference\Application\Service\ConferenceService;

class ConferenceServiceTest extends TestCase
{

    public function testInitService()
    {
        $service = new ConferenceService();
        $this->assertInstanceOf(ConferenceService::class, $service);
    }

    public function testGetConferences(){
        $this->assertTrue(true);
    }
}
