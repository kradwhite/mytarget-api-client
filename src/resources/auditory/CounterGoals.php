<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять целями счетчика Top@Mail.ru.
 * Class CounterGoals
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/CounterGoals
 */
class CounterGoals extends Resource
{
    /**
     * Запрос возвращает список всех целей указанного счетчика.
     * @param string $counter_id
     * @return mixed
     */
    public function get(string $counter_id)
    {
        return $this->request('get', "remarketing/counters/$counter_id/goals");
    }

    /**
     * Запрос создает цель указанного счетчика.
     * @param string $counter_id
     * @param array $params
     * @return mixed
     */
    public function post(string $counter_id, array $params)
    {
        return $this->request('post', "remarketing/counters/$counter_id/goals", ['json' => $params]);
    }
}