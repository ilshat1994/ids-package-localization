<?php

namespace Idsb2b\Localization\Services;

use GuzzleHttp\Exception\GuzzleException;
use Ids\Localizator\Translator;
use Ids\Localizator\TranslatorFactory;
use Idsb2b\Localization\Config;
use Predis\Client;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class Service
{
    private Translator $translator;
    private Config $config;

    public function __construct()
    {
        $this->config = Config::getInstance();

        $client = new Client([
            'scheme' => 'tcp',
            'host' => $this->config->getRedisHost(),
            'port' => $this->config->getRedisPort(),
        ]);

        $this->translator = TranslatorFactory::create(
            $this->config->getApplicationId(),
            $this->config->getLang(),
        )
            ->setLocalizatorUrl($this->config->getLocalizationUrl())
            ->setCache(new RedisAdapter($client))
            ->build();
    }

    /**
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    final public function getMessage(string $messageCode, string $parentId): string
    {
        return $this->translator->translateUi(
            $parentId,
            $messageCode,
            $this->config->getProductId()
        );
    }
}