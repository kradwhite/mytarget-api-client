<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять счетчиками Top@Mail.ru, добавленных пользователем в доступные для использования
 * в целевых аудиториях источники данных. Счетчики используются для настройки таргетинга на пользователей,
 * которые посещали сайт, где он установлен
 * Class RemarketingCounters
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingCounters
 */
class RemarketingCounters extends Resource
{
    /**
     * Запрос возвращает список всех счетчиков, добавленных пользователем в источники данных
     * @param array $filters
     * @return mixed
     */
    public function get(array $filters = [])
    {
        return $this->request('get', 'remarketing/counters', ['query' => $filters]);
    }

    /**
     * Запрос создает новый счетчик или добавляет существующий в список доступных источников данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/counters', ['json' => $params]);
    }
}