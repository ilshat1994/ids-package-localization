<?php

namespace Idsb2b\Localization\Messages;

interface MessageInterface
{
    public function getMessageCode(): string;
    public function getMessage($attributes = []): string;
    public function getResponseCode(): int;
}