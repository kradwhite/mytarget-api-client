MyTarget API Client for PHP.
==============================

Простой и удобный PHP-клиент [MyTarget Api](https://target.my.com/adv/api-marketing/).

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
    + [С помощью mytarget-api-oauth-client](https://github.com/kradwhite/mytarget-api-client#C-помощью-mytarget-oauth2-client)
    + [Ваш вариант](https://github.com/kradwhite/mytarget-api-client#Ваш-вариант)
- 2 [Инициализация клиента](https://github.com/kradwhite/mytarget-api-client#Инициализация-клиента)
- 3 [Примеры запросов](https://github.com/kradwhite/mytarget-api-client#Примеры-запросов)
- 4 [Полезная информация](https://github.com/kradwhite/mytarget-api-client#Полезная-информация)

## Получение токена
### С помощью mytarget-oauth2-client
В файле `composer.json`:
```php
{
    ...
    "require": {
        ...
        "kradwhite/mytarget-oauth-client": "*"
    }
    ...
}
```
...
```php
use kradwhite\mytarget\oauth

$oauth = new Oauth2();
$token = $oauth->clientCredentialsGrant('client_id', 'client_secret')->request();
$access_token = $token['access_token'];
```