<?php

namespace Idsb2b\Localization;

class Config
{
    final public static function getProductId(): string
    {
        return !empty(getenv('PRODUCT_ID_FOR_LOCALIZATION')) ? getenv('PRODUCT_ID_FOR_LOCALIZATION') : '-1';
    }

    final public static function getRedisHost(): string
    {
        return !empty(getenv('REDIS_HOST_FOR_LOCALIZATION')) ? getenv('REDIS_HOST_FOR_LOCALIZATION') : 'localhost';
    }

    final public static function getRedisPort(): string
    {
        return !empty(getenv('REDIS_PORT_FOR_LOCALIZATION')) ? getenv('REDIS_PORT_FOR_LOCALIZATION') : '6378';
    }
}