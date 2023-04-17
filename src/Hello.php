<?php

namespace Idsb2b\Localization;

use Idsb2b\Localization\Messages\ApplicationNotDeletedExceptionMessage;

class Hello
{
    public function __construct()
    {
        $ap = new ApplicationNotDeletedExceptionMessage();

        echo $ap->getMessage();
    }
}