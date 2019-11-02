<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс для управления списками локальной географии. После создания списков их можно включить в сегмент,
 * который можно включить в таргетинг кампании
 * Class LocalGeos
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/LocalGeos
 */
class LocalGeos extends Resource
{
    /**
     * Получение списка списков локальной географии
     * @param string $fields
     * @return mixed
     */
    public function get(string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('get', "remarketing/local_geo", ['query' => $query]);
    }

    /**
     * Создание списка локальной географии
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', "remarketing/local_geo", ['json' => $params]);
    }
}