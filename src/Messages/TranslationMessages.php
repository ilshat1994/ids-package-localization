<?php

namespace Idsb2b\Localization\Messages;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class TranslationMessages extends BaseMessage
{
    /**
     * @throws GuzzleException
     * @throws JsonException
     * @throws JsonException
     */
    final public static function get(string $messageCode, ...$attributes): string
    {
        $message = (new self())->setMessageCode($messageCode)->getMessage($attributes);

        return sprintf($message, ...$attributes);
    }
}