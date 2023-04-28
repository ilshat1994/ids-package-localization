<?php

namespace Idsb2b\Localization\Messages;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Cache\InvalidArgumentException;

class TranslationMessages extends BaseMessage
{
    /**
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    final public static function get(string $messageCode, string $parentId, ...$attributes): string
    {
        $message = (new self())
            ->setMessageCode($messageCode)
            ->setParentId($parentId)
            ->getMessage($attributes);

        return sprintf($message, ...$attributes);
    }
}