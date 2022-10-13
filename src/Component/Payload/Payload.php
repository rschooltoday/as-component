<?php
declare(strict_types=1);

namespace Rst\AsComponent\Payload;

class Payload
{
    public ?array $data = null;
    public ?string $message = null;
    public ?string $status = null;
    //public $result;

    /** A creation command succeeded. */
    const STATUS_CREATED = 'CREATED';

    /** A creation command failed. */
    const STATUS_NOT_CREATED = 'NOT_CREATED';

    /** A deletion command succeeded. */
    const STATUS_DELETED = 'DELETED';

    /** A deletion command failed. */
    const STATUS_NOT_DELETED = 'NOT_DELETED';

    /** There was a major error of some sort. */
    const STATUS_ERROR = 'ERROR';

    /** A query successfully returned results. */
    const STATUS_FOUND = 'FOUND';

    /** A new object is being returned. */
    const STATUS_NEW = 'NEW';

    /** A query failed to return results. */
    const STATUS_NOT_FOUND = 'NOT_FOUND';

    /** An update command succeeded. */
    const STATUS_UPDATED = 'UPDATED';

    /** An update command failed. */
    const STATUS_NOT_UPDATED = 'NOT_UPDATED';

    /** User input was not valid. */
    const STATUS_NOT_VALID = 'NOT_VALID';

    /** User input was valid. */
    const STATUS_VALID = 'VALID';

    const STATUS_CONFLICT = 'CONFLICT';

    const STATUS_SUCCESS = 'SUCCESS';

    const STATUS_FAILED = "FAILED";

}
