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
 * Class LocalGeo
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/LocalGeo
 */
class LocalGeo extends Resource
{
    /**
     * Редактирование списка локальной географии
     * @param string $local_geo_id
     * @param array $params
     * @return mixed
     */
    public function post(string $local_geo_id, array $params)
    {
        return $this->request('post', "remarketing/local_geo/$local_geo_id", ['json' => $params]);
    }

    /**
     * Удаление списка локальной географии
     * @param string $local_geo_id
     * @return mixed
     */
    public function delete(string $local_geo_id)
    {
        return $this->request('delete', "remarketing/local_geo/$local_geo_id");
    }
}