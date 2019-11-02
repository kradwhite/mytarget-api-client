<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий активировать и удалять ключи доступа к сторонним источникам данных (спискам пользователей,
 * счётчикам и т.п.). При активации ключа, сегменты им предоставляемые, будут добавлены в список сегментов
 * текущего пользователя. Удалить ключ может только владелец ключа
 * Class SharingKeyUser
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/SharingKeyUser
 */
class SharingKeyUser extends Resource
{
    /**
     * Запрос позволяет активировать ключ доступа и добавить себе все или часть источников из него
     * @param string $key
     * @param array $params
     * @return mixed
     */
    public function post(string $key, array $params = [])
    {
        return $this->request('post', "sharing_keys/$key", ['json' => $params]);
    }

    /**
     * Запрос позволяет владельцу удалить ключ. При этом у всех пользователей будет отозван доступ к источникам,
     * которые были добавлены по этому ключу. Кампании, в которых использовались эти источники, будут остановлены
     * @param string $key
     * @return mixed
     */
    public function delete(string $key)
    {
        return $this->request('delete', "sharing_keys/$key");
    }
}