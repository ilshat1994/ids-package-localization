<?php

namespace Idsb2b\Localization\Services\Client;

class LocalizationClientConfig
{
    public static function getBaseUrl(): string
    {
        return !empty(getenv('LOCALIZATION_URL')) ? getenv('REDIS_HOST') : 'http://localhost:8001';
    }

    public static function getLocalizationUri(): string
    {
        return '/api/translations/for-application';
    }

    public static function getTimeout(): int
    {
        return 60;
    }
}