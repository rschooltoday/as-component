<?php

namespace Rst\AsComponent\Conference\Domain\Entity;

abstract class AbstractConferenceEntity
{
    protected int $conferenceId;
    protected string $host;
    protected string $database;
    protected string $conferenceName;
    protected string $central;

    /**
     * @return int
     */
    public function getConferenceId(): int
    {
        return $this->conferenceId;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * @return string
     */
    public function getConferenceName(): string
    {
        return $this->conferenceName;
    }

    /**
     * @return string
     */
    public function getCentral(): string
    {
        return $this->central;
    }


    /**
     *
     * Register new conference
     *
     * @param $conferenceName
     * @param $host
     * @param $database
     * @param $central
     * @return void
     */
    public function registerNewConference($conferenceName, $host, $database, $central)
    {
        $this->conferenceName = $conferenceName;
        $this->host = $host;
        $this->database = $database;
        $this->central = $central;
    }
}