<?php

namespace Rst\AsComponent\Conference\Tests\Unit\Service;


use PHPUnit\Framework\TestCase;
use Rst\AsComponent\Conference\Application\Repository\ConferenceQueryRepositoryInterface;
use Rst\AsComponent\Conference\Application\Service\ConferenceService;
use Rst\AsComponent\Conference\Domain\Entity\AbstractConferenceEntity;
use Rst\AsComponent\Payload\Payload;

class ConferenceServiceTest extends TestCase
{

    public function testInitService()
    {
        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $conferenceService = new ConferenceService($queryRepository);
        $this->assertInstanceOf(ConferenceService::class, $conferenceService);
    }

    public function testGetConferences()
    {

        $expectedReturn = new Payload();

        $conference1 = $this->createMock(AbstractConferenceEntity::class);
        $conference2 = $this->createMock(AbstractConferenceEntity::class);
        $conference3 = $this->createMock(AbstractConferenceEntity::class);

        $expectedReturn->data = [$conference1, $conference2, $conference3];
        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $queryRepository->expects($this->once())->method('getConferences')->willReturn($expectedReturn->data);
        $conferenceService = new ConferenceService($queryRepository);
        $getConferences = $conferenceService->getConferences();
        $this->assertInstanceOf(Payload::class, $getConferences);

        $this->assertSame($expectedReturn->data, $getConferences->data);
        $this->assertSame(Payload::STATUS_FOUND, $getConferences->status);
    }


    public function testConferenceDetailNotFound()
    {
        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $queryRepository->expects($this->once())->method('getConferenceDetail')->with(1)->willReturn(null);
        $conferenceService = new ConferenceService($queryRepository);
        $getConferenceDetail = $conferenceService->getConferenceDetail(1);

        $this->assertInstanceOf(Payload::class, $getConferenceDetail);
        $this->assertNull($getConferenceDetail->data);
        $this->assertSame(Payload::STATUS_NOT_FOUND, $getConferenceDetail->status);

    }

    public function testGetDetailConference()
    {
        $conferenceId = 1;

        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $expectedReturn = new Payload();
        $expectedReturn->data = ['conference_name' => 'lakeconference', 'host' => 'beta.lakeconference.org', 'conference_id' => 1];
        $queryRepository->expects($this->once())
            ->method('getConferenceDetail')
            ->with($conferenceId)
            ->willReturn($expectedReturn->data);
        $conferenceService = new ConferenceService($queryRepository);
        $getConferenceDetail = $conferenceService->getConferenceDetail($conferenceId);
        $this->assertInstanceOf(Payload::class, $getConferenceDetail);
        $this->assertSame($expectedReturn->data, $getConferenceDetail->data);
        $this->assertSame(Payload::STATUS_FOUND, $getConferenceDetail->status);

    }


}
