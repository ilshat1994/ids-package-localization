<?php

namespace Idsb2b\Localization\Services\Client;

class LocalizationClientConfig
{
    public static function getBaseUrl(): string
    {
        return 'http://localhost:8001';
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