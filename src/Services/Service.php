<?php

namespace Idsb2b\Localization\Services;

use GuzzleHttp\Exception\GuzzleException;
use Idsb2b\Localization\Config;
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
    final public function getMessage(string $messageCode, string $parentId): string
    {
        $application = '5';
        $redisKey = $this->getRedisKey($messageCode, $parentId, 'rus', $application);
        $message = $this->cacheService->get($redisKey);

        if (!$message) {
            $translations = $this->localizationClient->getAllTranslations($application);
            $this->addTranslationsInRedis($translations, $application);
            $message = $this->cacheService->get($redisKey);
        }

        return $message ?? $messageCode;
    }

    private function addTranslationsInRedis(array $translations, string $application): void
    {
        foreach ($translations['data'] as $product) {
            foreach ($product['translations'] as $language => $parents) {
                foreach ($parents as $parent => $items) {
                    foreach ($items as $messageCode => $item) {
                        $redisKey = $this->getRedisKey(
                            $messageCode,
                            $parent,
                            $language,
                            $application,
                            $product['product_id']
                        );
                        $this->cacheService->set($redisKey, $item);
                    }
                }
            }
        }
    }

    private function getRedisKey(
        string $messageCode,
        string $parentId,
        string $lang,
        string $application,
        string $productId = null
    ): string {
        $productKey = $productId ?? Config::getProductId();

        return 'localization' . $application . $productKey . $lang . $parentId . $messageCode;
    }
}