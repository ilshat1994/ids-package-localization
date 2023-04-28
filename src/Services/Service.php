<?php

namespace Idsb2b\Localization\Services;

use GuzzleHttp\Exception\GuzzleException;
use Ids\Localizator\Translator;
use Ids\Localizator\TranslatorFactory;
use Idsb2b\Localization\Config;
use Idsb2b\Localization\Services\Client\LocalizationClient;
use Idsb2b\Localization\Services\Redis\RedisCacheService;
use Idsb2b\Localization\Services\Redis\RedisConfig;
use JsonException;
use Predis\Client;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class Service
{
    private Translator $translator;

    public function __construct()
    {
        $client = new Client([
            'scheme' => 'tcp',
            'host' => Config::getRedisHost(),
            'port' => Config::getRedisPort(),
        ]);

        $this->translator = TranslatorFactory::create(-1, 5, Config::getProductId(), 'http://localhost:8001')
            ->setCache(new RedisAdapter($client))
            ->build();
    }

    /**
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    final public function getMessage(string $messageCode, string $parentId): string
    {
        return $this->translator->setWarmCacheIfEmpty(true)->translate('rus', $parentId, $messageCode);
    }
}