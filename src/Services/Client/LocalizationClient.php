<?php

namespace Idsb2b\Localization\Services\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class LocalizationClient
{
    private Client $client;

    public function __construct()
    {
        $headers = [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
        ];

        $this->client = new Client([
            "headers" => $headers,
            "timeout" => LocalizationClientConfig::getTimeout()
        ]);
    }

    /**
     * @throws JsonException|GuzzleException
     */
    final public function getAllTranslations(string $application): array
    {
        $query = [
            'application' => $application,
            'parentType' => 'I'
        ];

        $response = $this->client->get(LocalizationClientConfig::getLocalizationUri(), ["query" => $query]);

        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}