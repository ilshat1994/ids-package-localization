<?php

namespace Idsb2b\Localization;

class Config
{
    final public static function getProductId(): string
    {
        return !empty(getenv('PRODUCT_ID_FOR_LOCALIZATION')) ? getenv('PRODUCT_ID_FOR_LOCALIZATION') : '-1';
    }
}