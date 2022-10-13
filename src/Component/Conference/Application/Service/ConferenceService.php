<?php


namespace Rst\AsComponent\Conference\Application\Service;

use Rst\AsComponent\Conference\Application\Repository\ConferenceQueryRepositoryInterface;

class ConferenceService implements ConferenceServiceInterface
{


    private ConferenceQueryRepositoryInterface $queryRepository;


    public function __construct(ConferenceQueryRepositoryInterface $queryRepository)
    {
        $this->queryRepository = $queryRepository;
    }

    public function getConferenceDetail(int $conferenceId): ?array
    {
        return $this->queryRepository->getConferenceDetail($conferenceId);
    }

    public function getConferences(): array
    {
        return $this->queryRepository->getConferences();
    }
}