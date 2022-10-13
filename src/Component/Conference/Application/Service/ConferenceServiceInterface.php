<?php

namespace Rst\AsComponent\Conference\Application\Service;

interface ConferenceServiceInterface
{

    public function getConferenceInfo(string $conferenceId): array;


}