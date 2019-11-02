<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять счетчиком Top@Mail.ru. Счетчики используются для настройки таргетинга
 * на пользователей, которые посещали сайт, где он установлен
 * Class RemarketingCounter
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingCounter
 */
class RemarketingCounter extends Resource
{
    /**
     * Запрос возвращает данные об указанном счетчике
     * @param string $counter_id
     * @return mixed
     */
    public function get(string $counter_id)
    {
        return $this->request('get', "remarketing/counters/$counter_id");
    }

    /**
     * Запрос изменяет параметры указанного счетчика
     * @param string $counter_id
     * @param array $params
     * @return mixed
     */
    public function post(string $counter_id, array $params)
    {
        return $this->request('post', "remarketing/counters/$counter_id", ['json' => $params]);
    }

    /**
     * Запрос удаляет указанный счетчик из доступных источников данных. Удаление возможно только если счетчик
     * не используется ни в одной аудитории и на его основе не создано ни одно lookalike-расширение.
     * @param string $counter_id
     * @return mixed
     */
    public function delete(string $counter_id)
    {
        return $this->request('delete', "remarketing/counters/$counter_id");
    }
}