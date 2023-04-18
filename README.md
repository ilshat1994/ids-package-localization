# localization sdk

# Установка

Используйте [composer](https://getcomposer.org/) для установки
```json
{
    "require": {
      "ids-b2b/localization": "dev-master"
    }
}
```

Для работы необходимо добавить в .env

```dotenv
LOCALIZATION_URL=
REDIS_HOST_FOR_LOCALIZATION=
REDIS_PORT_FOR_LOCALIZATION=
PRODUCT_ID_FOR_LOCALIZATION=
```

# Пример использования библиотеки

#### Получение перевода по коду.

```php
use Idsb2b\Localization\Messages\TranslationMessages

$message = TranslationMessages::get('GLB-00002');

var_dump($message);
```

#### Получение перевода по объекту.

```php
use Idsb2b\Localization\Messages\Exceptions\BackOffice\ApplicationNotDeletedExceptionMessage;

$exceptionMessage = new ApplicationNotDeletedExceptionMessage();

var_dump($exceptionMessage->getMessage());
```