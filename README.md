![Самозанятые](.github/swlogo.svg)

# Самозанятые SDK (PHP) 

SDK для работы с API [Самозанятые.рф](https://xn--80aapgyievp4gwb.xn--p1ai/)


## 📦 Установка

```

composer require hello-i-am-pavel/selfwork-sdk

```

## 🚀 Использование

Инициализация клиента и проверка подключения

```php
use Hiap\Selfwork\Selfwork\Config;

$config = new Config('login', 'password');

$client = new Client($config, new GuzzleHttp\Client());

$client->check();
```

## 📚 Документация

Официальная документация: [Самозанятые.рф](https://docs.selfwork.ru/api)

Документация по методам SDK с примерами использования описана в классах:

* [Common](src/Client/Common/Common.php)
* [ElectronicDocumentManagement](src/Client/ElectronicDocumentManagement/ElectronicDocumentManagement.php)
* [Payouts](src/Client/Payouts/Payouts.php)
* [SelfEmployed](src/Client/Selfemployed/SelfEmployed.php)
* [Statistics](src/Client/Statistics/Statistics.php)
* [Tax](src/Client/Tax/Tax.php)

## 📌 Дополнительно
- SDK активно развивается, в будущем **будут добавлены новые методы** и **переработаны существующие**.
- Официальная документация: [Самозанятые.рф](https://docs.selfwork.ru/api)
