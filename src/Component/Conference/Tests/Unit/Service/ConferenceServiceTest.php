<?php

namespace Rst\AsComponent\Conference\Tests\Unit\Service;


use PHPUnit\Framework\TestCase;
use Rst\AsComponent\Conference\Application\Repository\ConferenceQueryRepositoryInterface;
use Rst\AsComponent\Conference\Application\Service\ConferenceService;

class ConferenceServiceTest extends TestCase
{

    protected $queryRepository;
    protected $conferenceService;

    public function testInitService()
    {
        $service = $this->getConferenceService();
        $this->assertInstanceOf(ConferenceService::class, $service);
    }

    public function testGetConferences()
    {

        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $queryRepository->expects($this->once())->method('getConferences')->willReturn(['conferences1', 'conferences2', 'conference3']);
        $conferenceService = new ConferenceService($queryRepository);
        $getConferences = $conferenceService->getConferences();
        $this->assertIsArray($getConferences);
    }


    public function testConferenceDetailNotFound()
    {
        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $queryRepository->expects($this->once())->method('getConferenceDetail')->with(1)->willReturn(null);
        $conferenceService = new ConferenceService($queryRepository);
        $getConferenceDetail = $conferenceService->getConferenceDetail(1);

        $this->assertNull($getConferenceDetail);
    }

    public function testGetDetailConference()
    {
        $conferenceId = 1;

        $queryRepository = $this->createMock(ConferenceQueryRepositoryInterface::class);
        $expectedReturn = ['conference_name' => 'lakeconference', 'host' => 'beta.lakeconference.org', 'conference_id' => 1];
        $queryRepository->expects($this->once())->method('getConferenceDetail')
            ->with($conferenceId)
            ->willReturn($expectedReturn);
        $conferenceService = new ConferenceService($queryRepository);
        $getConferenceDetail = $conferenceService->getConferenceDetail($conferenceId);
        $this->assertSame($expectedReturn, $getConferenceDetail);
    }

    protected function getQueryRepository(): ConferenceQueryRepositoryInterface
    {
        return $this->queryRepository ??= $this->createMock(ConferenceQueryRepositoryInterface::class);
    }

    protected function getConferenceService(): ConferenceService
    {
        $queryRepository = $this->getQueryRepository();
        return $this->conferenceService ??= new ConferenceService($queryRepository);

    }


}
