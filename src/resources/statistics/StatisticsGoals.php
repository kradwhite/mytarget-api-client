<?php
/**
 * User: Aleksandrov Artem
 * Date: 25.10.2019
 * Time: 20:12
 */

namespace kradwhite\myTarget\api\resources\statistics;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс возвращает статистику по конверсиям Top@Mail.ru и установкам мобильных приложений по кампаниям
 * и баннерам в разрешении 1 день
 * Class StatisticsByGoals
 * @package kradwhite\myTarget\api\methods\statistics
 * @see https://target.my.com/adv/api-marketing/doc/stat-v2
 */
class StatisticsGoals extends Resource
{
    /**
     * Ресурс возвращает статистику по конверсиям Top@Mail.ru и установкам мобильных приложений
     * по кампаниям и баннерам в разрешении 1 день.
     * @param string $resource
     * @param string $id
     * @param string $date_from
     * @param string $date_to
     * @return mixed
     */
    public function get(string $resource, string $id, string $date_from, string $date_to)
    {
        return $this->request(
            'get',
            "statistics/goals/$resource/day",
            ['query' => ['date_from' => $date_from, 'date_to' => $date_to, 'id' => $id]]
        );
    }
}