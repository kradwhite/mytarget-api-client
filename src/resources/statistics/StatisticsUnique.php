<?php
/**
 * User: Aleksandrov Artem
 * Date: 25.10.2019
 * Time: 20:35
 */

namespace kradwhite\myTarget\api\resources\statistics;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Запрос uniquestat возвращает в том числе инормацию по уникальному охвату и его приросту, но при этом работает
 * дольше чем faststat. Не используйте uniquestat, если нет необходимости в информации по уникальному охвату
 * Class StatisticsUnique
 * @package kradwhite\myTarget\api\methods\statistics
 */
class StatisticsUnique extends Resource
{
    /**
     * @param string $resource
     * @param string $id
     * @return mixed
     */
    public function get(string $resource, string $id)
    {
        return $this->request('get', "statistics/uniquestat/$resource", ['query' => ['id' => $id]]);
    }
}