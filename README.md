MyTarget API Client for PHP.
==============================

Простой и удобный PHP-клиент для [MyTarget Api](https://target.my.com/adv/api-marketing/).

## Требования
 * PHP 7.0 и выше
 
## Установка  
В файле `composer.json`:
```php
{
    ...
    "require": {
        ...
        "kradwhite/mytarget-api-client": "*"
    }
    ...
}
```

## Использование
### Оглавление
- 1 [Получение токена](https://github.com/kradwhite/mytarget-api-client#Получение-токена)
- 2 [Инициализация клиента](https://github.com/kradwhite/mytarget-api-client#Инициализация-клиента)
- 3 [Конфигурация клиента](https://github.com/kradwhite/mytaget-api-client#Конфигурация-клиета)
- 4 [Примеры запросов](https://github.com/kradwhite/mytarget-api-client#Примеры-запросов)
- 5 [Полезная информация](https://github.com/kradwhite/mytarget-api-client#Полезная-информация)

## Получение токена
```php
use kradwhite\mytarget\oauth2\Oauth2;

$oauth = new Oauth2();
$token = $oauth->clientCredentialsGrant('client_id', 'client_secret')->request();
$access_token = $token['access_token'];
```
Для получения информации по другим видам токенов можно познакомится в [kradwhite\mytarget-oauth2](https://github.com/kradwhite/mytarget-oauth2)

## Инициализация клиента
```php
use kradwhite\mytarget\api\Client;

$client = new Client($access_token);
```

## Конфигурация клиента
```php
$config = [
    'sandbox' => true, // по умолчанию false. Если true, запросы будут отправляться к песочнице myTarget.
    'assoc' => false, // по умолчанию true. Если true, ответом на запросы к myTarget будет ассоциативный массив, в противно случае объект.    
    'debug' => true, // по умолчанию false. Включает опцию debug http://docs.guzzlephp.org/en/stable/request-options.html#debug.
    'timeout' => 0, // по умолчанию 0. Установка опции timeout http://docs.guzzlephp.org/en/stable/request-options.html#timeout.
    'transport' => Class::name, // по умолчанию kradwhite\mytarget\transport\Transport. Имя класса реализующего интерфейс kradwhite\mytarget\transport\TransportInterface.
];

// инициализация клиента с конфигурацией
$client = new Client($access_token, $config);
```

## Примеры запросов
```php
// получение кампаний
$allCampaigns = $client->campaigns()->get();

// получение активных кампаний
$activedCampaigns = $client->campaigns()->get([
    '_status' => 'active',
    'sorting' => 'id'
]);

// создание ссылки
$newUrlId = $client->createUrl()->post([
    'url' => 'http://example.com/123456789?1=1'
]);

// редактирование рекламного объявления
$response = $client->banner()->post([
    'status' => 'blocked'
]);

// запрос статистика по кампании
$statistics = $client->statistics()->get(
    'campaigns',        // название ресурса campaigns, banners или user.
    '1234',             // id ресурса, или несколько, через запятую
    'base',             // по умолчанию base, метрика
    'day',              // по умолчанию summary, summary или days. Eсли days, нужно указать 2 следующих параметры в виде даты
    '2019-10-08'        // дата начала статистики
    '2019-11-01'        // дата конца статистика
);
```

## Полезная информация
- В классе kradwhite\mytarget\api\Client перед каждым методом в комментариях имеется ссылка на оффициальную страницу в документации myTarget по запрашиваемому ресурсу.
- Имена методов клиента для получения ресурсов совпадают с именами ресурсов из официальной документации.
