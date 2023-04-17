<?php

namespace Idsb2b\Localization\Services\Redis;

use Predis\Client;

class RedisCacheService
{
    private Client $redisClient;

    public function __construct()
    {
        $this->redisClient = new Client([
            'scheme' => 'tcp',
            'host'   => RedisConfig::getHost(),
            'port'   => RedisConfig::getPort(),
        ]);
    }

    final public function get(string $key): ?string
    {
        return $this->redisClient->get($key);
    }

    final public function set(string $key, string $message): ?string
    {
        return $this->redisClient->set($key, $message);
    }
}