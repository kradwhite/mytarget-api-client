<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять целями счетчика Top@Mail.ru
 * Class CounterGoal
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/CounterGoal
 */
class CounterGoal extends Resource
{
    /**
     * Запрос редактирует указанную цель счетчика. Для редактирования доступны поля value, name, goal_type
     * @param string $counter_id
     * @param string $goal_id
     * @param array $params
     * @return mixed
     */
    public function post(string $counter_id, string $goal_id, array $params)
    {
        return $this->request('post', "remarketing/counters/$counter_id/goals/$goal_id", ['json' => $params]);
    }
}