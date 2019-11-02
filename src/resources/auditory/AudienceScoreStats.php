<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий построить гистограмму типовой аудитории
 * Class AudienceScoreStats
 * @package kradwhite\myTarget\api
 * @see https://target.my.com/doc/api/ru/resource/AudienceScoreStats
 */
class AudienceScoreStats extends Resource
{
    /**
     * Запрос возвращает гистограмму размера аудитории в зависимости
     * от степени соответствия текущих пользователей обучающей выборке
     * @param string $audience_id
     * @return mixed
     */
    public function get(string $audience_id)
    {
        return $this->request('get', "remarketing/custom_audiences/$audience_id/histogram");
    }
}