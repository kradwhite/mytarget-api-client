<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий получить списки пользователей от партнерских DMP. Такие списки используются
 * для настройки таргетинга на аудиторию пользователей, полученную из внешнего источника
 * Class DmpSegment
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/DmpSegment
 */
class DmpSegment extends Resource
{
    /**
     * Запрос возвращает список всех внешних сегментов, доступных для добавления в источники данных
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'dmp/segments');
    }
}