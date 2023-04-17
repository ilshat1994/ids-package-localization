<?php

namespace Idsb2b\Localization\Messages;

use Idsb2b\Localization\Services\Service;

abstract class BaseMessage implements MessageInterface
{
    protected int $responseCode = 500;
    protected string $messageCode = '';

    private Service $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    final public function getMessage($attributes = []): string
    {
        $message = $this->service->getMessage($this->messageCode);

        return sprintf($message, ...$attributes);
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
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
}