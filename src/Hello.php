<?php

namespace Idsb2b\Localization;


use Idsb2b\Localization\Messages\Exceptions\BackOffice\ApplicationNotDeletedExceptionMessage;
use Idsb2b\Localization\Messages\TranslationMessages;

class Hello
{
    public function __construct()
    {
        $ap = new ApplicationNotDeletedExceptionMessage();

        echo TranslationMessages::get('GLB-00003', 'testParentt22');

        echo $ap->getMessage();
    }
}