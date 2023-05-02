<?php

namespace Idsb2b\Localization\Traits;

trait SingletonTrait
{
    private static $instance = null;

    /**
     * Запрещаем прямое создание.
     */
    private function __construct()
    {
        //
    }

    /**
     * Запрещаем клонирование
     */
    private function __clone()
    {
    }

    /**
     * Запрещаем десериализацию.
     */
    private function __wakeup()
    {
    }

    public static function getInstance(): self
    {
        return static::$instance ?? (static::$instance = new static());
    }
}