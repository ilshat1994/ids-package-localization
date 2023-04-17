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
            'host'   => '10.0.0.1',
            'port'   => 6379,
        ]);
    }

    final public function get(string $key): ?string
    {
        return '123';
    }

    final public function set(string $key): ?string
    {
        return '123';
    }
}