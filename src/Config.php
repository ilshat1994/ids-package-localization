<?php

namespace Idsb2b\Localization;

use Idsb2b\Localization\Traits\SingletonTrait;

class Config
{
    use SingletonTrait;

    private int $productId;
    private string $redisHost;
    private int $redisPort;
    private int $applicationId;
    private string $localizationUrl;
    private string $lang;

    final public function build(
        int $productId = -1,
        string $redisHost = 'localhost',
        int $redisPort = 6378,
        int $applicationId = 5,
        string $localizationUrl = 'http://localhost:8001',
        string $lang = 'rus'
    ): void {
        $this->productId = $productId;
        $this->redisHost = $redisHost;
        $this->redisPort = $redisPort;
        $this->applicationId = $applicationId;
        $this->localizationUrl = $localizationUrl;
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    final public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @return string
     */
    final public function getLocalizationUrl(): string
    {
        return $this->localizationUrl;
    }

    /**
     * @return int
     */
    final public function getApplicationId(): int
    {
        return $this->applicationId;
    }

    /**
     * @return int
     */
    final public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    final public function getRedisHost(): string
    {
        return $this->redisHost;
    }

    /**
     * @return int
     */
    final public function getRedisPort(): int
    {
        return $this->redisPort;
    }
}