<?php

namespace Idsb2b\Localization\Services;

use GuzzleHttp\Exception\GuzzleException;
use Idsb2b\Localization\Services\Client\LocalizationClient;
use Idsb2b\Localization\Services\Redis\RedisCacheService;
use JsonException;

class Service
{
    private LocalizationClient $localizationClient;
    private RedisCacheService $cacheService;

    public function __construct()
    {
        $this->localizationClient = new LocalizationClient();
        $this->cacheService = new RedisCacheService();
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    final public function getMessage(string $messageCode): string
    {
        $message = $this->cacheService->get($messageCode);
        var_dump($_ENV);
        var_dump($message);
        die();
        $response = $this->localizationClient->get();
        var_dump($response);
        die();
        return $messageCode;
    }
}