<?php


namespace Rst\AsComponent\Conference\Application\Service;

use Rst\AsComponent\Conference\Application\Repository\ConferenceQueryRepositoryInterface;
use Rst\AsComponent\Payload\Payload;

class ConferenceService implements ConferenceServiceInterface
{

    private Payload $payload;
    private ConferenceQueryRepositoryInterface $queryRepository;

    public function __construct(ConferenceQueryRepositoryInterface $queryRepository)
    {
        $this->queryRepository = $queryRepository;
        $this->payload = new Payload();
    }

    public function getConferenceDetail(int $conferenceId): Payload
    {
        $this->payload->status = Payload::STATUS_NOT_FOUND;
        $getData = $this->queryRepository->getConferenceDetail($conferenceId);
        if (!null == $getData) {
            $this->payload->status = Payload::STATUS_FOUND;
            $this->payload->data = $getData;
        }
        return $this->payload;
    }

    public function getConferences(): Payload
    {
        $this->payload->status = Payload::STATUS_NOT_FOUND;

        $getData = $this->queryRepository->getConferences();
        if (!null == $getData) {
            $this->payload->status = Payload::STATUS_FOUND;
            $this->payload->data = $getData;
        }
        return $this->payload;
    }
}