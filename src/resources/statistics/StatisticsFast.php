<?php
/**
 * User: Aleksandrov Artem
 * Date: 25.10.2019
 * Time: 20:32
 */

namespace kradwhite\myTarget\api\resources\statistics;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс возвращает базовую статистику по рекламным объектам в режиме реального времени, без учёта фильтрации
 * некорректного траффика. Значения в итоговой статистике могут значительно отличаться.
 * Class StatisticsFast
 * @package kradwhite\myTarget\api\methods\statistics
 * @see https://target.my.com/adv/api-marketing/doc/stat-v2
 */
class StatisticsFast extends Resource
{
    /**
     * @param string $resource
     * @param string $id
     * @return mixed
     */
    public function get(string $resource, string $id)
    {
        return $this->request('get', "statistics/faststat/$resource", ['query' => ['id' => $id]]);
    }
}