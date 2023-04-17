<?php

namespace Idsb2b\Localization\Services\Redis;

class RedisConfig
{
    final public static function getHost(): string
    {
        return !empty(getenv('REDIS_HOST_FOR_LOCALIZATION')) ? getenv('REDIS_HOST_FOR_LOCALIZATION') : 'localhost';
    }

    final public static function getPort(): string
    {
        return !empty(getenv('REDIS_PORT_FOR_LOCALIZATION')) ? getenv('REDIS_PORT_FOR_LOCALIZATION') : '6378';
    }
}
