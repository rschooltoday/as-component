<?php

namespace Rst\AsComponent\Conference\Application\Repository;

interface ConferenceQueryRepositoryInterface
{

    public function getConferences(): array;

    public function getConferenceDetail(int $conferenceId): ?array;

}