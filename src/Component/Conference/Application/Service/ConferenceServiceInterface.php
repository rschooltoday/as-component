<?php

namespace Rst\AsComponent\Conference\Application\Service;

interface ConferenceServiceInterface
{

    public function getConferenceDetail(int $conferenceId): ?array;

    public function getConferences(): array;


}