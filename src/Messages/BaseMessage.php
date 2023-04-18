<?php

namespace Idsb2b\Localization\Messages;

use GuzzleHttp\Exception\GuzzleException;
use Idsb2b\Localization\Services\Service;
use JsonException;

abstract class BaseMessage implements MessageInterface
{
    protected int $responseCode = 500;
    protected string $messageCode = '';
    protected string $parentId = '';

    private Service $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    final public function getMessage($attributes = []): string
    {
        $message = $this->service->getMessage($this->messageCode, $this->parentId);

        return sprintf($message, ...$attributes);
    }

    /**
     * @return int
     */
    final public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    final public function getMessageCode(): string
    {
        return $this->messageCode;
    }

    final protected function setMessageCode(string $code): self
    {
        $this->messageCode = $code;

        return $this;
    }

    final protected function setParentId(string $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }
}