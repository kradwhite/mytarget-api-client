<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:20
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет проверить рекламируемые ссылки перед отправкой объявления на модерацию
 * Class CreateUrl
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/CreateUrl
 */
class CreateUrl extends Resource
{
    /**
     * Запрос создает новый объект URL в системе и отправляет его на проверку. Проверка считается законченной,
     * когда у объекта URL заполняется поле "url_types".
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'urls', ['json' => $params]);
    }
}