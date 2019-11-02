<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий создавать ключи доступа к источникам данных (спискам пользователей, счётчикам и т.п.)
 * Class SharingKey
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/SharingKey
 */
class SharingKey extends Resource
{
    /**
     * Возвращает список всех ключей доступа, созданных пользователем
     * @param string $_key
     * @return mixed
     */
    public function get(string $_key = "")
    {
        $query = $_key ? ['_key' => $_key] : [];
        return $this->request('get', 'sharing_keys', ['query' => $query]);
    }

    /**
     * Создает ключ доступа к источникам данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'sharing_keys', ['json' => $params]);
    }
}