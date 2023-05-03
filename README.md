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

Необходимо добавить в .env. Примере параметров для локальной разработки.

```dotenv
LOCALIZATOR_PRODUCT_ID=-1
LOCALIZATOR_REDIS_HOST=192.168.1.122
LOCALIZATOR_REDIS_PORT=6378
LOCALIZATOR_URL=192.168.1.122:8001
```

Необходимо добавить в app.php.

```dotenv
'localizator' => [
    'product_id' => env('LOCALIZATOR_PRODUCT_ID', -1),
    'redis_host' => env('LOCALIZATOR_REDIS_HOST', '192.168.1.122'),
    'redis_port' => env('LOCALIZATOR_REDIS_PORT', 6378),
    'url' => env('LOCALIZATOR_REDIS_URL', '192.168.1.122:8001'),
],
```

Инициализация библиотеки происходит в middleware.
```php
Route::get('/test', [Controller::class, 'index'])->middleware(LocalizatorMiddleware::class);
```

# Пример использования библиотеки

#### Получение перевода по коду.

```php
use Idsb2b\Localization\Messages\TranslationMessages

$message = TranslationMessages::get('GLB-00003', 'testParentt22');

var_dump($message);
```

#### Получение перевода по объекту.

```php
use Idsb2b\Localization\Messages\Exceptions\BackOffice\ApplicationNotDeletedExceptionMessage;

$exceptionMessage = new ApplicationNotDeletedExceptionMessage();

var_dump($exceptionMessage->getMessage());
```