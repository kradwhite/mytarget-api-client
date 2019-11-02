<?php
/**
 * User: Aleksandrov Artem
 * Date: 25.10.2019
 * Time: 19:58
 */

namespace kradwhite\myTarget\api\resources\statistics;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс возвращает суммарную за все время открутки или подневную за выбранный период статистику
 * по аккаунтам, кампаниям, баннерам
 * Class Statistics
 * @package kradwhite\myTarget\api\methods\statistics
 * @see https://target.my.com/adv/api-marketing/doc/stat-v2
 */
class Statistics extends Resource
{
    /**
     * Ресурс возвращает суммарную за все время открутки или подневную за выбранный период статистику
     * по аккаунтам, кампаниям, баннерам
     * @param string $resource
     * @param string $id
     * @param string $metrics
     * @param string $aggregation
     * @param string $date_to
     * @param string $date_from
     * @return mixed
     */
    public function get(string $resource, string $id, string $metrics = 'base', string $aggregation = 'summary', string $date_from = '', string $date_to = '')
    {
        $query = ['id' => $id, 'metrics' => $metrics];
        if ($aggregation == 'day') {
            $query['date_from'] = $date_from;
            $query['date_to'] = $date_to;
        }
        return $this->request('get', "statistics/$resource/$aggregation", ['query' => $query]);
    }
}