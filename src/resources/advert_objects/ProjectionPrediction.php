<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:26
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, возвращающий прогноз охвата аудитории в зависимости от стоимости события
 * Class ProjectionPrediction
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/ProjectionPrediction
 */
class ProjectionPrediction extends Resource
{
    /**
     * Получение прогноза по кампании или пакетам
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', '/api/v2/projection', ['json' => $params]);
    }
}