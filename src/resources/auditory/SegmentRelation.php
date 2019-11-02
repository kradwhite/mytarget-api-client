<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий изменять параметры источника данных в сегменте аудитории
 * Class SegmentRelation
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/SegmentRelation
 */
class SegmentRelation extends Resource
{
    /**
     * Запрос изменяет параметры источника данных в сегменте аудитории. Изменять можно только значения из поля "params"
     * @param string $segment_id
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $segment_id, string $id, array $params)
    {
        return $this->request('post', "remarketing/segments/$segment_id/relations/$id", ['json' => $params]);
    }

    /**
     * Запрос удаляет источник данных из сегмента аудитории
     * @param string $segment_id
     * @param string $id
     * @return mixed
     */
    public function delete(string $segment_id, string $id)
    {
        return $this->request('delete', "remarketing/segments/$segment_id/relations/$id");
    }
}