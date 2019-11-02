<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить список всех целей, доступных для таргетирования или получения статистики. Список содержит
 * цели счётчиков Top@Mail.ru, действий для приложений и групп социальных сетей и установки мобильных приложений
 * Class Goals
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/Goals
 */
class Goals extends Resource
{
    /**
     * Запрос возвращает список всех доступных целей
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'goals');
    }
}