<?php
/**
 * User: Aleksandrov Artem
 * Date: 25.10.2019
 * Time: 20:27
 */

namespace kradwhite\myTarget\api\resources\statistics;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс возвращает статистику по аттрибуцированным с рекламными показами myTarget событиями из списков
 * оффлайн конверсий по кампаниям в разрешении 1 день.
 * Class StatisticsOfflineConversions
 * @package kradwhite\myTarget\api\methods\statistics
 * @see https://target.my.com/adv/api-marketing/doc/stat-v2
 */
class StatisticsOfflineConversions extends Resource
{
    /**
     * @param string $id
     * @param string $date_from
     * @param string $date_to
     * @return mixed
     */
    public function get(string $id, string $date_from, string $date_to)
    {
        return $this->request(
            'get',
            'statistics/offline_conversions/campaigns/day',
            ['query' => ['id' => $id, 'date_from' => $date_from, 'date_to' => $date_to]]
        );
    }
}