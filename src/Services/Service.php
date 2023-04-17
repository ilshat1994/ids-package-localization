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
        $application = 'ap1';
        //TODO:: Переделать под нормальынй ключ. Который получим из JWT токена.
        $redisKey = $application . ':product_id:1:fin:testParentt22:' . $messageCode;
        $message = $this->cacheService->get($redisKey);

        if (!$message) {
            $translations = $this->localizationClient->getAllTranslations();
            $this->addTranslationsInRedis($translations);
            $message = $this->cacheService->get($redisKey);
        }

        return $message ?? $messageCode;
    }

    private function addTranslationsInRedis(array $translations): void
    {
        $application = 'ap1';

        foreach ($translations['data'] as $product) {
            $productId = $application . ':product_id:' . $product['product_id'];

            foreach ($product['translations'] as $language => $parents) {
                $languageKey = $productId . ':' . $language;

                foreach ($parents as $parent => $items) {
                    $parentKey = $languageKey . ':' . $parent;
                    foreach ($items as $key => $item) {
                        $redisKey = $parentKey . ':' . $key;
                        $this->cacheService->set($redisKey, $item);
                    }
                }
            }
        }
    }
}