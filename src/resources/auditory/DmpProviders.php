<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить информацию о партнерских DMP, которые
 * поддерживают запрос данных/доступа к сегментам аудитории
 * Class DmpProviders
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/DmpProviders
 */
class DmpProviders extends Resource
{
    /**
     * Запрос возвращает список всех партнерских DMP, поддерживающих запрос данных/доступа к сегментам аудитории
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'dmp/providers');
    }
}