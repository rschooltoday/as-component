<?php

namespace Rst\AsComponent\Conference\Application\Service;

use Rst\AsComponent\Payload\Payload;

interface ConferenceServiceInterface
{

    public function getConferenceDetail(int $conferenceId): Payload;

    public function getConferences(): Payload;


}