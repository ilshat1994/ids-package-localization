<?php

namespace Idsb2b\Localization\Services\Redis;

class RedisConfig
{
    final public static function getHost(): string
    {
        return !empty(getenv('REDIS_HOST')) ? getenv('REDIS_HOST') : 'localhost';
    }

    final public static function getPort(): string
    {
        return !empty(getenv('REDIS_PORT')) ? getenv('REDIS_PORT') : '6378';
    }
}
